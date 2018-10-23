var express = require('express');
var router = express.Router();
var passport = require('passport');
/* GET users listing. */
router.get('/', function(req, res, next) {
  res.send('respond with a resource');
});

router.post('/signup',passport.authenticate('local-signup',{failureFlash:true,failureRedirect : '/signup'}),(err,res)=>{
  res.send("you have properly signed up");
}
  //res.statusMessage(req.session.id);
  //res.writeHead("Hello");
);

router.post('/login',passport.authenticate('local-login'),(req,res,next)=>{
  res.send("You are now successfully logged in");
});

module.exports = router;
