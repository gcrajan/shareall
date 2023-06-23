<?php

$conn = new mysqli("localhost","root","root");
if($conn->connect_error){die("Error connecting to db");}

if(!$conn ->query("Create database Shareall")){die("Error in db creation");}

$conn = new mysqli("localhost","root","root","Shareall");
if($conn->connect_error){die("Error connecting to db shareall");}

if(!$conn->query("create table Users(
                    Uemail varchar(100) primary key,
                    Uname varchar(100),
                    Upassword varchar(70),
                    Upic varchar(100),
                    Ulocation varchar(100),
                    Ulocation2 varchar(100),
                    Ucontact varchar(100)
                                           )
                                            ")){die("error creating user table");}
                                         
if(!$conn->query("create table Items(
                    Iid int primary key auto_increment,
                    Uemail varchar(100),
                    Iname varchar(100),
                    Istock int,
                    ICategory varchar(30),
                    Ipic varchar(100),
                    foreign key (Uemail) references Users(Uemail)
                                                                    )
                                                                    ")){die("error creating Item table");}

if(!$conn->query("create table Blogs(
                    Bid int primary key auto_increment,
                    Uemail varchar(100),
                    Btitle varchar(100),
                    Bdiscription varchar(100),
                    Bpic varchar(100),
                    foreign key (Uemail) references Users(Uemail)
                                                                    )
                                                                    ")){die("error creating Blog table");}

if(!$conn->query("create table Requests(
                    Rid int primary key auto_increment,
                    RUemail varchar(100),
                    Iid int,
                    Rcount int,
                    RLocation varchar(100),
                    foreign key (RUemail) references Users(Uemail),
                    foreign key (Iid) references Items(Iid)
                                                                )
                                                                    ")){die("error creating Requests table");}

if(!$conn->query("create table Likes(
                    Uemail varchar(100),
                    Iid int,
                    foreign key (Uemail) references Users(Uemail),
                    foreign key (Iid) references Items(Iid)
                                                            )
                                                                ")){die("error creating Requests table");}
                                                                
// if(!$conn->query()){die("");}
                            
echo "Database succesfully migrated to mysql";
?>