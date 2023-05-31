const express=require("express")
const mongo=require("mongodb").MongoClient
const app=express()
var url="mongodb://127.0.0.1:27017/session"
mongo.connect(url,(err,db)=>{
    if (err) throw err
    var dbc=db.db("person")
    // dbc.createCollection("data",(err,dat)=>{
    //     if(err) throw err
    //     console.log("collection created")
    // })

    app.get('/insert',(req,res)=>{
        let data=[{name:'abinesh',email:"abinesh@gmail.com" ,age: 19, city:"CBE"},
        {name:'pranesh',email:"pranesh@gmail.com" ,age: 20, city:"MS"},
        {name:'jack',email:"jack@gmail.com" ,age: 18, city:"TEN"},
        {name:'krithik',email:"krithik@gmail.com" ,age: 19, city:"CBE"},
        {name:'aswin',email:"aswin@gmail.com" ,age: 19, city:"CBE"}
    ];
        dbc.collection("data").insert(data,(err,res)=>{
            if(err) throw err
            console.log("Data inserted")
        })
    })

    app.get('/getdata',(req,res)=>{
        let data={name:"jack"}
        dbc.collection("data").findOne(data,(err,res)=>{
            if (err) throw err
            console.log(res)
        })
    })

    app.get('/update',(req,res)=>{
        let data={name:"abinesh"}
        let updates={$set:{name:"abineshwari"}}
        dbc.collection("data").updateOne(data,updates,(err,res)=>{
            if(err) throw err
            console.log(JSON.stringify("Updates done"+res))
        })
    })

    app.get('/delete',(req,res)=>{
        let data={name:"aswin"}
        dbc.collection("data").deleteOne(data,(err,res)=>{
            if(err) throw err
            console.log("Deleted")
        })
    })
})

app.listen(3000,()=>{
    console.log("Server running")
})