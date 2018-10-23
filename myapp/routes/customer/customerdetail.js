var express = require('express');
var router = express.Router();
var bodyparser = require('body-parser');
var connection = require("../../config");

router.use(bodyparser.json());
//router.use(bodyparser.text());
router.use(bodyparser.urlencoded({extended:false}));
router.route('/')
//using escape strings to prevent from sql injections
.get((req,res)=>{
    var sql = "select * from customers where cid = ?";
    connection.query(sql,[req.user[0].id],(err,result,field)=>{
        if(err) throw err;
        else
            console.log(result);
    })
})
.post((req,res,next)=>{
    var sql = "insert into customers(cid,fname,mname,lname,phno,address,email) values(?,?,?,?,?,?,?)";
    connection.query(sql,[req.user[0].id,req.body.fname,req.body.mname,req.body.lname,req.body.phno,req.body.address,req.body.email],(err,files)=>{
        if(err) throw err;
        console.log("correctly inserted");
    })
})
module.exports = router;