var express = require('express');
var router = express.Router();
var bodyparser = require('body-parser');
var connection = require("../../config");

router.use(bodyparser.json());
router.use(bodyparser.text());
router.use(bodyparser.urlencoded({extended:false}));

router.route('/')
.post((req,res,next)=>{
    //console.log("asdsad" , req.user[0].username);
    var sql = "insert into request (category,shirts,pants,tshirts,bedsheets,delivery,quantity,total_cost,cid) values (?,?,?,?,?,?,?,?)";
    connection.query(sql,[req.body.category,req.body.shirts,req.body.pants,req.body.tshirts,req.body.bedsheets,req.body.delivery,req.body.quantity,req.body.cost,req.user[0].id],(err,file)=>{
        if(err) throw err;
        console.log("record correctly inserted");
    });
});
module.exports = router;