<style>
.gallery .Portfolio {
    position: relative;
    margin: 5px;
    border: 2px solid black;
    float: left;
    width: 90px;
    transition-duration: 0.4s;
    border-radius: 5px;
    animation: winanim 0.5s ;
-webkit-backface-visibility:visible;
    backface-visibility:visible;
    box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)
}

.gallery .Portfolio:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}

.gallery .Portfolio img {
    width: 100%;
    height: auto;
    border-radius: 5px
}

.gallery .desc {
    padding: 5px;
    text-align: center;
    font-size: 90%;
    background:#3A0ADA;
    color:#FFF;
    font-weight: bold;
    font-family: 'Roboto', sans-serif;
}

#cart, #error {
    font-family: 'Roboto', sans-serif;
    font-size: .92em;
}
.gallery .nav {
    padding:20px;
    margin-left:340px;
    margin-top:-30px;
}

.gallery .nav li a { 
    margin:5px;
    padding: 15px 50px; 
    font-size:16px; 
    color:hotpink; 
    background: #444;
    transition-duration: 0.4s;
}
.gallery .nav a:hover { 
    background:#333; 
}
.gallery .nav .active { 
    background-color:hotpink !important;
    color:#fff;
}


.borderless td, .borderless th {
    border: none;
}

.table {
    border:0px !important;
    font-weight: bold;
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:0px !important;
}

@keyframes winanim {
    0%{opacity:0;transform:scale3d(.3,.3,.3)}
    50%{opacity:1}
    
}





.push_button {
    position: relative;
    width:60px;
    height:40px;
    text-align:center;
    color:#FFF;
    text-decoration:none;
    line-height:43px;
    font-family:'Oswald', Helvetica;
    display: block;
    margin: 5px;
}
.push_button:before {
    background:#f0f0f0;
    background-image:-webkit-gradient(linear, 0% 0%, 0% 100%, from(#D0D0D0), to(#f0f0f0));
    
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    border-radius:5px;
    
    -webkit-box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF; 
    -moz-box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF; 
    box-shadow:0 1px 2px rgba(0, 0, 0, .5) inset, 0 1px 0 #FFF;
    
    position: absolute;
    content: "";
    left: -6px; right: -6px;
    top: -6px; bottom: -10px;
    z-index: -1;
}

.push_button:active {
    -webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset;
    top:5px;
}
.push_button:active:before{
    top: -11px;
    bottom: -5px;
    content: "";
}

.red {
    text-shadow:-1px -1px 0 #A84155;
    background: #D25068;
    border:1px solid #D25068;
    
    background-image:-webkit-linear-gradient(top, #F66C7B, #D25068);
    background-image:-moz-linear-gradient(top, #F66C7B, #D25068);
    background-image:-ms-linear-gradient(top, #F66C7B, #D25068);
    background-image:-o-linear-gradient(top, #F66C7B, #D25068);
    background-image:linear-gradient(to bottom, #F66C7B, #D25068);
    
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    border-radius:5px;
    
    -webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #AD4257, 0 4px 2px rgba(0, 0, 0, .5);
    -moz-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #AD4257, 0 4px 2px rgba(0, 0, 0, .5);
    box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #AD4257, 0 4px 2px rgba(0, 0, 0, .5);
}

.red:hover {
    background: #F66C7B;
    background-image:-webkit-linear-gradient(top, #D25068, #F66C7B);
    background-image:-moz-linear-gradient(top, #D25068, #F66C7B);
    background-image:-ms-linear-gradient(top, #D25068, #F66C7B);
    background-image:-o-linear-gradient(top, #D25068, #F66C7B);
    background-image:linear-gradient(top, #D25068, #F66C7B);
}

.blue {
    text-shadow:-1px -1px 0 #2C7982;
    background: #3EACBA;
    border:1px solid #379AA4;
    background-image:-webkit-linear-gradient(top, #48C6D4, #3EACBA);
    background-image:-moz-linear-gradient(top, #48C6D4, #3EACBA);
    background-image:-ms-linear-gradient(top, #48C6D4, #3EACBA);
    background-image:-o-linear-gradient(top, #48C6D4, #3EACBA);
    background-image:linear-gradient(top, #48C6D4, #3EACBA);
    
    -webkit-border-radius:5px;
    -moz-border-radius:5px;
    border-radius:5px;
    
    -webkit-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
    -moz-box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
    box-shadow:0 1px 0 rgba(255, 255, 255, .5) inset, 0 -1px 0 rgba(255, 255, 255, .1) inset, 0 4px 0 #338A94, 0 4px 2px rgba(0, 0, 0, .5);
}

.blue:hover {
    background: #48C6D4;
    background-image:-webkit-linear-gradient(top, #3EACBA, #48C6D4);
    background-image:-moz-linear-gradient(top, #3EACBA, #48C6D4);
    background-image:-ms-linear-gradient(top, #3EACBA, #48C6D4);
    background-image:-o-linear-gradient(top, #3EACBA, #48C6D4);
    background-image:linear-gradient(top, #3EACBA, #48C6D4);
}
</style>
</head>