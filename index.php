<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="app/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
    <div class="header">
        <div class="icon">
            <img src="app/img/imgComprador.png" alt="">
        </div>
        <span class="title">Valoramos tu experiencia</span>        
    </div>
    <div class="body" id="app">
        <div class="content">
            <div class="cuestionOne">
                <div class="cuestion">¿Estas satisfecho con el lote adjudicado?</div>
                <div class="item">Hyundai HD65 2014</div>
                <ul class="stars">
                    <li><span class="icon-i2"></span></li>
                    <li><span class="icon-i2"></span></li>
                    <li><span class="icon-i2"></span></li>
                    <li><span class="icon-i2"></span></li>
                    <li><span class="icon-i2"></span></li>
                </ul>
            </div>
            <div class="cuestionTwo">
                <div class="cuestion">¿Cómo calificas tu experiencia con <span class="text-bold">Olva Courier<span>?</div>
                <ul class="stars">
                    <li class="icon-i2"></li>
                    <li class="icon-i2"></li>
                    <li class="icon-i2"></li>
                    <li class="icon-i2"></li>
                    <li class="icon-i2"></li>
                </ul>
            </div>
            <div class="textArea">
                <div class="cuestion">Déjanos tu testimonio</div>
                <textarea class="input" v-model="message"></textarea>
                {{message}}
               <!--  {{message}} -->
            </div>
        </div>
    </div>
    <script>
        var app = new Vue({
            el: "#app",
            data:{
                message: "",
                x: 0,
                y: 0
            },
            watch: {
                message: function(newValue, oldValue){
                    console.log(newValue, oldValue);
                }
            },
        })
    </script>
</body>
</html>