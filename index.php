<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Encuesta</title>
    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="app/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
    <div class="headerPoll">
        <div class="icon">
            <img src="app/img/imgComprador.png" alt="">
        </div>
        <span class="title">Valoramos tu experiencia</span>        
    </div>
    <div class="bodyPoll" id="appPoll">
        <div class="content">
            <div class="cuestionOne">
                <div class="cuestion">¿Estas satisfecho con el lote adjudicado?</div>
                <div class="item">Hyundai HD65 2014</div>
                <ul class="stars" :class="'star-' + (displayStar ? displayStar : currentStar)">
                    <li><span class="icon-i2" @mouseover="rating(1)"  @mouseleave="rating()" @click="setstar(1)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating(2)"  @mouseleave="rating()"  @click="setstar(2)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating(3)"  @mouseleave="rating()"  @click="setstar(3)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating(4)"  @mouseleave="rating()"  @click="setstar(4)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating(5)"  @mouseleave="rating()"  @click="setstar(5)" ></span></li>
                </ul>
            </div>
            <div class="cuestionTwo" v-if="show_1">
                <div class="cuestion">¿Cómo calificas tu experiencia con <span class="text-bold">Olva Courier<span>?</div>
                <ul class="stars" :class="'star-' + (displayStar_owner ? displayStar_owner : currentStar_owner)" >
                    <li><span class="icon-i2" @mouseover="rating_owner(1)"  @mouseleave="rating_owner()" @click="setstar_owner(1)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating_owner(2)"  @mouseleave="rating_owner()"  @click="setstar_owner(2)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating_owner(3)"  @mouseleave="rating_owner()"  @click="setstar_owner(3)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating_owner(4)"  @mouseleave="rating_owner()"  @click="setstar_owner(4)" ></span></li>
                    <li><span class="icon-i2" @mouseover="rating_owner(5)"  @mouseleave="rating_owner()"  @click="setstar_owner(5)" ></span></li>
                </ul>
            </div>            
            <div class="textArea"> 
                <div class="cuestion" id="title_textarea"></div>                          
                <div style="position: relative" v-if="show_2">                 
                    <textarea class="input"
                        :value="value"                    
                        @input="updateValue"
                        :maxlength="maxlenght">
                    </textarea>
                    <div class="circle">
                        <svg viewBox="-1 -1 34 34">
                            <circle cx="16" cy="16" r="15.9155"
                                    class="progress-bar__background"/>
                            <circle cx="16" cy="16" r="15.9155"
                                    :class="progress + ' js-progress-bar'"/>
                        </svg>
                    </div>
                </div>
                <div id="count" align="right" style="font-size:11px; margin-top:5px"></div>
            </div>
            <div class="text-center" v-if="show_2">
                <button class="btn-historial" :disabled="buttonactive" from_encuesta="session" type="button">Enviar</button>
            </div>
        </div>
    </div>
    <script>
        var app = new Vue({
            el: '#appPoll',
            data: {
                value: '',
                maxlenght: 280,
                restlenght: 280,
                displayStar: null,
                currentStar: null,
                starset: "",
                displayStar_owner: null,
                currentStar_owner: null,
                starset_owner: "",
                starseted: "",
                starseted_owner: "",
                show_1:false,
                show_2:false,
                buttonactive:true,
                progress:"progress-bar__progress"
            },
            methods: {
                rating: function(number){
                    if(number){
                        this.displayStar = number;
                    }else{
                        this.displayStar = null;
                    }                    
                },
                rating_owner: function(number){
                    if(number){
                        this.displayStar_owner = number;
                    }else{
                        this.displayStar_owner = null;
                    }                    
                },
                setstar: function(number){
                    this.currentStar = number;
                    this.starseted = number;
                    this.show_1 = true;    
                },
                setstar_owner: function(number){
                    this.currentStar_owner = number;
                    this.starset_owner = number;
                    this.show_2 = true;
                    if(number <= 2){
                        document.getElementById('title_textarea').innerHTML = "¿Cómo puede mejorar <span class='text-bold'>Olva Courier<span>?";
                    }else{
                        document.getElementById('title_textarea').innerHTML = "Déjanos tu testimonio";
                    }                  
                },
                updateValue(e) {        
                        this.value = e.target.value;        
                        var len = e.target.value.length;
                        //caculo del 100% para el indicador//
                        var percentageComplete = (len*100/this.maxlenght);
                        //caculo del 100% para el indicador//
                        var strokeDashOffsetValue = 100 - (percentageComplete);                        
                        var progressBar = document.querySelector(".js-progress-bar");
                        var btnactive = 10;
                        progressBar.style.strokeDashoffset = strokeDashOffsetValue; 
                        document.getElementById('count').innerHTML = (this.maxlenght - len)+"/280 ";
                        //switch para cambiar clase color al indicador segun avance al maximo o retroceda el nro de caracteres//                                                 
                        switch (percentageComplete)
                        {
                            case 67.5:
                            this.progress = "progress-bar__progress"
                                break;
                            case 70:                               
                            this.progress = "progress-bar__progress_warning"
                                break;  
                            case 92.5:                               
                            this.progress = "progress-bar__progress_warning"
                                break;   
                            case 95:                               
                            this.progress = "progress-bar__progress_danger"
                                break;                         
                        }
                        //switch para cambiar clase color al indicador segun avance al maximo o retroceda el nro de caracteres// 
                        //disable o active button enviar
                        if(len > btnactive){
                            this.buttonactive = false;
                        }else{
                            this.buttonactive = true;
                        }
                        //disable o active button enviar
                    if(len >= this.maxlenght){
                        document.getElementById('count').innerHTML = "Límite alcanzado.";
                        e.stopPropagation();
                        this.value = this.value.substring(0,this.maxlenght);
                        progressBar.style.strokeDashoffset = 0;            
                    }    
                }
            },
            computed: {
                count(){ 
                    return this.maxlenght - this.value.length;
                    
                } 
            }
        })
    </script>
</body>
</html>