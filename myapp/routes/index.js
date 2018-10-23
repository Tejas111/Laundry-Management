var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index.ejs');
})
router.get('/about', function(req, res, next) {
  res.render('about.ejs');
})
router.get('/codes', function(req, res, next) {
  res.render('codes.ejs');
})
router.get('/icons', function(req, res, next) {
  res.render('icons.ejs');
})
router.get('/gallery', function(req, res, next) {
  res.render('gallery.ejs');
})
router.get('/services', function(req, res, next) {
  res.render('services.ejs');
})
router.get('/contact', function(req, res, next) {
  res.render('contact.ejs');
})
module.exports = router;
