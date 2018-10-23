var LocalStrategy = require('passport-local').Strategy;
//  var passport = require('passport');
var bcrypt = require('bcrypt-nodejs');
var connection = require('../config');
module.exports = function (passport) {
    passport.serializeUser(function (user, done) {
        done(null, user.id);
    });
    passport.deserializeUser(function (id, done) {
        connection.query("SELECT * FROM users WHERE id = ? ", [id], function (err, rows) {
            //console.log(rows);
            done(err, rows);
        });
    });


    passport.use(
        'local-signup',
        new LocalStrategy({

            usernameField: 'username',
            passwordField: 'password',
            passReqToCallback: true
        },
            function (req, username, password, done) {
                
                connection.query("SELECT * FROM users WHERE username = ?", [username], function (err, rows) {
                    if (err)
                        return done(err);
                    if (rows.length) {
                        return done(null, false, req.flash('signup','you already have signed up!'));
                    } else {

                        var newUserMysql = {
                            username: username,
                            password: bcrypt.hashSync(password, null, null)
                        };
                        
                        var insertQuery = "INSERT INTO users ( username, password ) values (?,?)";
                       // console.log("hello");
                        connection.query(insertQuery, [newUserMysql.username, newUserMysql.password], function(err,rows) {
                            console.log(err);
                            console.log(rows);
                            //console.log("hello");
                            
                             newUserMysql.id = rows.insertId;
                         return done(null, newUserMysql);
                        });
                    }
                });
            })
    );

    // =========================================================================
    // LOCAL LOGIN =============================================================
    // =========================================================================
    // we are using named strategies since we have one for login and one for signup
    // by default, if there was no name, it would just be called 'local'

        passport.use('local-login', new LocalStrategy({
            // by default, local strategy uses username and password, we will override with email
            usernameField : 'username',
            passwordField : 'password',
            passReqToCallback : true // allows us to pass back the entire request to the callback
        },
        function(req, username, password, done) { // callback with email and password from our form

             connection.query("SELECT * FROM `users` WHERE `username` = '" + username+ "'",function(err,rows){
    			if (err)
                    return done(err);
    			 if (!rows.length) {
                    return done(null, false, req.flash('loginMessage', 'No user found.')); // req.flash is the way to set flashdata using connect-flash
                } 

    			// if the user is found but the password is wrong
                if (!bcrypt.compareSync(password,rows[0].password))
                    return done(null, false, req.flash('loginMessage', 'Oops! Wrong password.')); // create the loginMessage and save it to session as flashdata

                // all is well, return successful user
                return done(null, rows[0]);			

    		});



        }));

}
