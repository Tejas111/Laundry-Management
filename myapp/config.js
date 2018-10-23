var mysql = require('mysql');
//var flash = require('connect-flash');
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: "dbms"
});
connection.connect(function (err) {
    if (err) throw err;
    //console.log("Connected!");
});
module.exports = connection;