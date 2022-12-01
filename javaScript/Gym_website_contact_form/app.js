const express=require("express");
const path=require("path");
const port=3000;
const app=express();
app.use("/static",express.static("static"));
app.set("view engine","pug");
app.set("views",path.join(__dirname,"views"));

app.get("/",(req,res)=>{
    res.status(200).render("index.pug");
});
app.listen(port,()=>{
    console.log(`Our server has stated at http://localhost:${port}/`);
});