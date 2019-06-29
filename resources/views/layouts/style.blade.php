<link href="{{ asset('img/icon.png') }}" rel="shortcut icon" >
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
<link href="{{asset('css/sweetalert.css')}}">
<style>
select:hover{
  box-shadow: 0px 1px 10px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.100);
}
input:hover{
  box-shadow: 0px 1px 10px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.100);
}
.form-rounded {
border-radius: 1rem;
}
#return-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #216e69;
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.9s linear;
    -moz-transition: all 0.9s ease;
    -ms-transition: all 0.9s ease;
    -o-transition: all 0.9s ease;
    transition: all 0.9s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 16px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.2s linear;
    -moz-transition: all 0.2s ease;
    -ms-transition: all 0.2s ease;
    -o-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
#return-to-top:hover {
    background: #1AA39A;
    box-shadow: 0px 1px 23px rgba(0,0,0,0.12), 0 1px 22px rgba(0,0,0,0.100);
}
#return-to-top:hover i {
    color: white;
    top: 5px;
}
#almtcrd {
  position: fixed;
  z-index: 1;
  width: 49%;
  overflow-x: hidden;
}
#crdfix {
  position: fixed;
  z-index: 1;
  width: 48%;
  overflow-x: hidden;
}
html body{
  font-family: Geneva, Tahoma, Verdana, sans-serif;  
  background: linear-gradient(45deg,#edf7f6,#edf7f6,#fff,#fff);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center; 
}

.navbar-brand{
    text-transform: uppercase;
    background: black;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-family:"Comic Sans MS", cursive, sans-serif;
}
.navbar{
  -webkit-transition: all 0.6s ease;
    -moz-transition: all 0.6s ease;
    -ms-transition: all 0.6s ease;
    -o-transition: all 0.6s ease;
    transition: all 0.6s ease;
}
.sticky-top.scrolled{
  background: white;
    -webkit-transition: all 0.6s ease;
    -moz-transition: all 0.6s ease;
    -ms-transition: all 0.6s ease;
    -o-transition: all 0.6s ease;
    transition: all 0.6s ease;

}
footer{
    bottom: 0;
    width: 100%;
  background:#f7f8ff;
}


.btn-google {
  color: white;
  background-color: #ea4335;
}
.btn-facebook {
  color: white;
  background-color: #3b5998;
}
.hm1{
  color: #3b5998;
}
.hm1:hover{
    
}
.hm2{
  color: #38A1F3;
}
.hm2:hover{
    
}
.hm3{
  color: #0077B5;
}
.hm3:hover{
    
}
.hm4{
  color:#ea4335 ;
}
.hm4:hover{
    
}
.hm5{
  color:#25d366  ;
}
.hm5:hover{
    
}
.hm6{
  color:#00c300;
}
.hm6:hover{
    
}
.hehe {
    width: 400px;
    position:relative;
    top:7px;
} 
.fontz::placeholder{
  color:#ff6666;
}
.szDown{
  height:400px;
  width:250px;
}
.has-search .fa-search:hover {
transition:0.8s;
}
.has-search .form-control:hover::placeholder {
transition:0.8s;
color:transparent;
}
.has-search .form-control::placeholder {
  color: #000;
}
.has-search .form-control {
    padding-left: 2.375rem;
    text-decoration:none;
    background:transparent;
    color:#000;
    border: 1px solid black;
}
.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 1.900rem;
    text-align: center;
    color: #000;
}

html body{
  font-family: Geneva, Tahoma, Verdana, sans-serif;  
  background: linear-gradient(45deg,#edf7f6,#edf7f6,#fff,#fff);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center; 
}

.card{
  border: 0px solid black;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.card-header{
  border:0;
  background:white;
}
.imgcrd{
    height: 120px; width: 125px;
}
.cardz:hover{
  box-shadow: 0px 21px 23px rgba(0,0,0,0.12), 0 1px 22px rgba(0,0,0,0.100);
}
.cardz:hover .imgs{
  opacity:0.3;
}
.ctn{
  display:none; 
}
.card:hover .ctn{
  background:white; 
  padding: 5px ;
  display:block;
  z-index:3;
  opacity:1;
  position:absolute;
  bottom:-100px;
  width:160px;
  box-shadow: -8px 22px 25px -4px rgba(0,0,0,0.100), 5px 22px 22px rgba(0,0,0,0.100);
}
.eyecard{
  opacity:0;
  display:none;
  visibility: hidden;
  -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.cardz:hover .eyecard{
  position:absolute; 
  display:block;
  top: 55px;
  right: 40px;
  opacity:1;
  visibility: visible;
  transition: all 0.3s ease; 
}
.hih{
  position:absolute; 
  display:block;
  top: 130px;
  right: 5px;
  opacity:1;
}


@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}
@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
.wrapper {
    display: flex;
    align-items: stretch;
}

#sidebar {
    min-width: 200px;
    max-width: 200px;
    min-height: 100vh;
    
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .dropdown-togle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

#sidebar, a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {

    background:transparent;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: ;
}


#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li .btn:hover {
    border-color: #7386D5;
    color: white;
    background: #7386D5;
}
#sidebar ul li a:hover {
    color: white;
    background: #7386D5;
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: ;
}
.hr-sect {
	display: flex;
  font-size:13px;
	flex-basis: 100%;
	align-items: center;
	color: black;
	margin: 8px 0px;
}
.hr-sect::before,
.hr-sect::after {
	content: "";
	flex-grow: 1;
	background: black;
	height: 1px;
	font-size: 0px;
	line-height: 0px;
	margin: 0px 8px;
}

.star-rating {
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  /* width: 250px; remove this */
  height: 50px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  /* width: 20%; remove this */
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  /* width: 20%; remove this */
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}
::after,
::before {
  height: 100%;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  text-align: center;
  vertical-align: middle;
}

.star-rating.star-5 {width: 250px;}
.star-rating.star-5 input,
.star-rating.star-5 i {width: 20%;}
.star-rating.star-5 i ~ i {width: 40%;}
.star-rating.star-5 i ~ i ~ i {width: 60%;}
.star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
.star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

.star-rating.star-3 {width: 150px;}
.star-rating.star-3 input,
.star-rating.star-3 i {width: 33.33%;}
.star-rating.star-3 i ~ i {width: 66.66%;}
.star-rating.star-3 i ~ i ~ i {width: 100%;}


.btns{
  letter-spacing: 0.05em;
	display: block;
	border: 0;
	outline: none;
	transition: .3s ease-in-out;
  background: #216e69;
  color: #fff;
}
.btns:hover{
  background: #1AA39A;
  color: #fff;
  cursor:pointer;
}
.btns:active{
  background: #13D4C8;
		transition: 0.1s ease-in-out;
}

.btnd{
  letter-spacing: 0.05em;
	border: none;
	outline: none;
	transition: .3s ease-in-out;
  background: #d11010;
  color: #fff;
  text-decoration: none;
  display: inline-block;
  }
.btnd:hover{
  background: #e80d0d;
  color: #fff;
  cursor:pointer;
}
.btnd:active{
  background: red;
		transition: 0.1s ease-in-out;
}
.labels1{
display: block;
word-wrap: break-word;
color: #1a4756;
}
.hidden, #uploadImg1:not(.hidden) + label{
display: none;
}
#file1{
display: none;
}
#upload1{
display: block;
border: 0;
 
cursor: pointer;
outline: none;
transition: .3s ease-in-out;
}
#upload1:hover, #upload1:focus{
}
#upload1:active{
transition: .1s ease-in-out;
}
/*2*/
.labels2{
display: block;
word-wrap: break-word;
color: #1a4756;
}
.hidden, #uploadImg2:not(.hidden) + label{
display: none;
}
#file2{
display: none;
}
#upload2{
display: block;
border: 0;
 
cursor: pointer;
outline: none;
transition: .3s ease-in-out;
}
#upload2:hover, #upload2:focus{
}
#upload2:active{
transition: .1s ease-in-out;
}
/*3*/
.labels3{
display: block;
word-wrap: break-word;
color: #1a4756;
}
.hidden, #uploadImg3:not(.hidden) + label{
display: none;
}
#file3{
display: none;
}
#upload3{
display: block;
border: 0;

cursor: pointer;
outline: none;
transition: .3s ease-in-out;
}
#upload3:hover, #upload3:focus{
}
#upload3:active{
transition: .1s ease-in-out;
}
/*4*/
.labels4{
display: block;
word-wrap: break-word;
color: #1a4756;
}
.hidden, #uploadImg4:not(.hidden) + label{
display: none;
}
#file4{
display: none;
}
#upload4{
display: block;
border: 0;
 
cursor: pointer;
outline: none;
transition: .3s ease-in-out;
}
#upload4:hover, #upload4:focus{
}
#upload4:active{
transition: .1s ease-in-out;
}
img{
}
.labels1edit{
display: block;
word-wrap: break-word;
color: #1a4756;
}
.hidden, #uploadImg1edit:not(.hidden) + label{
display: none;
}
#file1edit{
display: none;
}
#upload1edit{
display: block;
border: 0;
cursor: pointer;
outline: none;
transition: .3s ease-in-out;
}
#upload1edit:hover, #upload1edit:focus{
}
#upload1edit:active{
transition: .1s ease-in-out;
}

</style>