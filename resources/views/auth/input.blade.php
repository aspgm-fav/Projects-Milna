<style>
.group            { 
  position:relative; 
  margin-bottom:20px; 
}
input{
  font-size:15px;
  padding:5px 5px 10px 14px;
  background:transparent;  
  width:500px;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus {
  outline:none; }

label{
  color:#000; 
  font-size:15px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

input:focus ~label, input:valid ~ label,  :disabled ~ label      {
  top:-20px;
  font-size:12px;
  color:#1AA39A;
}

/* BOTTOM BARS ================================= */
.bar    { position:relative; display:block; width:500px; }
.bar:before, .bar:after     {
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#1AA39A; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%; 
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}
@keyframes inputHighlighter {
    from { background:transparent; }
  to    { width:0; background:transparent; }
}

</style>
@stack('style')