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
</style>
</head>