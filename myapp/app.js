var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var session  = require('express-session');
var logger = require('morgan');
var filestore = require('session-file-store')(session);
var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var passport = require('passport');
var flash    = require('connect-flash');
var passportConfig = require('./models/signup');
var app = express();
var placeorder = require('./routes/customer/placeorder');
// var p2 = require('./routes/p2');
// var p = require('./routes/p');
// var p3 = require('./routes/p3');


// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use(session({
	secret: 'tejaskumar',
	resave: true,
  saveUninitialized: true,
  store: new filestore()
 } )); // session secret
 passportConfig(passport);

app.use(passport.initialize());
app.use(passport.session());
app.use(flash()); 

app.use('/', indexRouter);
app.use('/users', usersRouter);
app.use('/placeorder',placeorder);
// app.use('/p',p);
// app.use('/p2',p2);
// app.use('/p3',p3);
// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

module.exports = app;
