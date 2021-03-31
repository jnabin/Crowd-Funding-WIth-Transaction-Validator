const { json } = require('body-parser');
const express = require('express');
const userModel = require.main.require('./models/userModel')
router = express.Router();
const path = require('path');
const fs = require('fs');
const https = require('http');
var querystring = require("querystring");




router.get('/getFromNode', (req, res)=>{
    console.log("api connection");
	userModel.apistore(function(results){
		console.log("api connection from database**************");
		
		res.send(results);
	});
	
});



router.post('/postFromNode', (req, res)=>{
	console.log("api connection from post");

	var obj = {
		id : req.body.id,
		target_fund : req.body.target_fund,
		ctype : req.body.ctype,
		description : req.body.description,
		issueDate : req.body.issueDate,
		EndDate : req.body.EndDate,
		title : req.body.title,
		userid : req.body.userid,
		identity : req.body.identity,
		vote : 0,
		votedUser: [

        ]
	};
	var data=fs.readFileSync('./public/json/pending_transaction.json', 'utf8');
	console.log(data);
    var entitylist=JSON.parse(data);
    entitylist.push(obj);
    fs.writeFile("./public/json/pending_transaction.json", JSON.stringify(entitylist, null, 2), (err) => {
        if (err) {
            console.error(err);
            res.send("campaign has listed for validation review");
        }
	});
	console.log("api connection from post json");
	res.send("your request is processing under validator");

});


router.get('/updateEntity/:id', (req, res)=>{
    var id = req.params.id;
    var data=fs.readFileSync('./public/json/pending_transaction.json', 'utf8');
    var entitylist=JSON.parse(data);
    var entity;
    entitylist.forEach(function(item){
        if(item.id == id){
            entity = item;
            return;
        }
    });

    res.render('organization/updateEntity',entity);
});



router.get('/approve/:id', (req, res)=>{
	console.log("jkkdgashgdshv");
    var id = req.params.id;
    var data=fs.readFileSync('./public/json/pending_transaction.json', 'utf8');
    var entitylist=JSON.parse(data);
    var vote;
	var i;
    entitylist.forEach(function(item,index){
		
		if(item.id == id){
			console.log(req.cookies['username']);
			
            item.votedUser.push({
                "userName" : req.cookies['username']
			});
			//console.log(item);
			item.vote +=1;
			vote = item.vote;
            i = index;
            return;
		}
	});
		userModel.getCount(function(user){
			if(vote > user.count/2){
				var entity = {
					id : entitylist[i].userid,
					title : entitylist[i].title,
					target_fund : entitylist[i].target_fund,
					ctype : entitylist[i].ctype,
					
					description : entitylist[i].description,
					issueDate : entitylist[i].issueDate,
					EndDate : entitylist[i].EndDate,
					userid : entitylist[i].userid
				};
				console.log("inserting..............");			
				userModel.insert(entity,function(status){
						
					if(status)	{
						
						console.log("inseryfyfting..............");		
						userModel.deleteentity(entitylist[i].id,function(stat){
							if(stat){
					userModel.getAlluserName(function(results){
					var county = 0;
					var taunty = results.length;
					results.forEach(function(user){
						fs.exists('./public/json/'+user.username+'.json', function(exists){
							if(exists){
								var data=fs.readFileSync('./public/json/'+user.username+'.json', 'utf8');
								var validentity=JSON.parse(data);
								validentity.push(entitylist[i]);
								fs.writeFile('./public/json/'+user.username+'.json', JSON.stringify(validentity, null, 2), (err) => {
									if (err) {
										console.error(err);
										return;
								}
								});
								if(county == taunty-1){
									entitylist = entitylist.filter(item => item !== entitylist[i]);
									fs.writeFile("./public/json/pending_transaction.json", JSON.stringify(entitylist, null, 2), (err) => {
										if (err) {
											console.error(err);
											return;
										}  
										res.redirect('/home');
									});
								}
								county++;
							}
							else{
								var array =[entitylist[i]];
								fs.writeFile('./public/json/'+user.username+'.json', JSON.stringify(array, null, 2), (err) => {
									if (err) {
										console.error(err);
										return;
									}
								});
								if(county == taunty-1){
									entitylist = entitylist.filter(item => item !== entitylist[i]);
									fs.writeFile("./public/json/pending_transaction.json", JSON.stringify(entitylist, null, 2), (err) => {
										if (err) {
											console.error(err);
											return;
										}  
										res.redirect('/home');
									});
								}
								county++;
							}
						});
					});
				}); 
			}
			});
			}
			});	
				var data = querystring.stringify({
					_token: 'LhTsymoueRtcWtjP69MD1KEbDyGl0NGuewWOieER',
					id : entitylist[i].id,
					title : entitylist[i].title,
					target_fund : entitylist[i].target_fund,
					ctype : entitylist[i].ctype,
					image : entitylist[i].image,
					description : entitylist[i].description,
					issueDate : entitylist[i].issueDate,
					EndDate : entitylist[i].EndDate,
					userid : entitylist[i].userid
				  });
			}else{
				fs.writeFile("./public/json/pending_transaction.json", JSON.stringify(entitylist, null, 2), (err) => {
										if (err) {
											console.error(err);
											return;
										}  
										res.redirect('/home');
									});
			}
		});

});



router.get('/reject/:id', (req, res)=>{
    var id = req.params.id;
    var data=fs.readFileSync('./public/json/pending_transaction.json', 'utf8');
    var entitylist=JSON.parse(data);
    entitylist.forEach(function(item){
        if(item.id == id){
            item.votedUser.push({
                "userName" : req.cookies['uname'] 
            });
            return;
        }
    });
    fs.writeFile("./public/json/pending_transaction.json", JSON.stringify(entitylist, null, 2), (err) => {
            if (err) {
                console.error(err);
                return;
            }
        });
		res.redirect('/home');
});




module.exports = router