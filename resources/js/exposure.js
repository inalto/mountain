(function(){const l=document.createElement("link").relList;if(l&&l.supports&&l.supports("modulepreload"))return;for(const e of document.querySelectorAll('link[rel="modulepreload"]'))t(e);new MutationObserver(e=>{for(const i of e)if(i.type==="childList")for(const n of i.addedNodes)n.tagName==="LINK"&&n.rel==="modulepreload"&&t(n)}).observe(document,{childList:!0,subtree:!0});function o(e){const i={};return e.integrity&&(i.integrity=e.integrity),e.referrerpolicy&&(i.referrerPolicy=e.referrerpolicy),e.crossorigin==="use-credentials"?i.credentials="include":e.crossorigin==="anonymous"?i.credentials="omit":i.credentials="same-origin",i}function t(e){if(e.ep)return;e.ep=!0;const i=o(e);fetch(e.href,i)}})();function r(s){this.init=async function(l){this.id=Date.now(),this.tpl='<div class="arrow"></div><canvas  data-popover width="200" height="200"></canvas><svg width="100%" height="100%" viewBox="0 0 140 140" version="1.1" xmlns="http://www.w3.org/2000/svg" style="fill-rule:evenodd;clip-rule:evenodd;"><g><path d="M10,70c-0,-33.115 26.885,-60 60,-60c33.115,-0 60,26.885 60,60c-0,33.115 -26.885,60 -60,60c-33.115,-0 -60,-26.885 -60,-60Z" style="fill:url(#gr'+this.id+`);" /><path d="M30,70c-0,-22.077 17.923,-40 40,-40c22.077,0 40,17.923 40,40c-0,22.077 -17.923,40 -40,40c-22.077,-0 -40,-17.923 -40,-40Z" style="fill:#fff;" /></g><g><path d="M13.592,4.655l-0,-1.648c-0,-0.294 -0.157,-0.566 -0.412,-0.713c-0.255,-0.147 -0.569,-0.147 -0.824,-0c-0.255,0.147 -0.412,0.419 -0.412,0.713l0,1.648c0,0.294 0.157,0.566 0.412,0.713c0.255,0.148 0.569,0.148 0.824,0c0.255,-0.147 0.412,-0.419 0.412,-0.713Z" style="fill-rule:nonzero;" /><path d="M18.594,7.891c0.218,0 0.428,-0.086 0.582,-0.241l1.165,-1.165l0,0c0.159,-0.153 0.25,-0.364 0.251,-0.585c0.002,-0.221 -0.085,-0.434 -0.241,-0.59c-0.156,-0.156 -0.368,-0.243 -0.589,-0.241c-0.222,0.002 -0.433,0.092 -0.586,0.251l-1.165,1.165c-0.154,0.155 -0.241,0.364 -0.241,0.583c-0,0.218 0.087,0.428 0.241,0.582c0.155,0.155 0.364,0.241 0.583,0.241l-0,0Z" style="fill-rule:nonzero;" /><path d="M22.654,13.717c0.294,0 0.566,-0.157 0.713,-0.412c0.148,-0.255 0.148,-0.569 0,-0.824c-0.147,-0.255 -0.419,-0.412 -0.713,-0.412l-1.648,0c-0.294,0 -0.566,0.157 -0.713,0.412c-0.147,0.255 -0.147,0.569 -0,0.824c0.147,0.255 0.419,0.412 0.713,0.412l1.648,0Z" style="fill-rule:nonzero;" />
<path
    d="M19.176,18.136c-0.154,-0.159 -0.365,-0.25 -0.585,-0.251c-0.221,-0.002 -0.434,0.085 -0.59,0.241c-0.156,0.156 -0.243,0.368 -0.241,0.589c0.002,0.221 0.092,0.432 0.251,0.586l1.165,1.165l-0,-0c0.209,0.202 0.51,0.279 0.79,0.202c0.281,-0.077 0.5,-0.296 0.577,-0.577c0.077,-0.28 -0,-0.581 -0.202,-0.79l-1.165,-1.165Z"
    style="fill-rule:nonzero;" />
<path
    d="M11.944,21.132l0,1.648c0,0.294 0.157,0.566 0.412,0.713c0.255,0.147 0.569,0.147 0.824,-0c0.255,-0.147 0.412,-0.419 0.412,-0.713l-0,-1.648c-0,-0.295 -0.157,-0.566 -0.412,-0.714c-0.255,-0.147 -0.569,-0.147 -0.824,0c-0.255,0.148 -0.412,0.419 -0.412,0.714Z"
    style="fill-rule:nonzero;" />
<path
    d="M6.36,18.136l-1.165,1.165c-0.159,0.153 -0.249,0.364 -0.251,0.585c-0.002,0.221 0.085,0.434 0.241,0.59c0.156,0.156 0.369,0.243 0.59,0.241c0.221,-0.002 0.432,-0.092 0.585,-0.251l1.165,-1.165l0,-0c0.159,-0.154 0.25,-0.365 0.252,-0.586c0.002,-0.221 -0.085,-0.433 -0.242,-0.589c-0.156,-0.156 -0.368,-0.243 -0.589,-0.241c-0.221,0.001 -0.432,0.092 -0.586,0.251l0,-0Z"
    style="fill-rule:nonzero;" />
<path
    d="M2.882,13.717l1.648,0c0.294,0 0.566,-0.157 0.713,-0.412c0.147,-0.255 0.147,-0.569 0,-0.824c-0.147,-0.255 -0.419,-0.412 -0.713,-0.412l-1.648,0c-0.294,0 -0.566,0.157 -0.713,0.412c-0.148,0.255 -0.148,0.569 -0,0.824c0.147,0.255 0.419,0.412 0.713,0.412Z"
    style="fill-rule:nonzero;" />
<path
    d="M7.525,7.65c0.155,-0.154 0.242,-0.364 0.242,-0.582c-0,-0.218 -0.087,-0.428 -0.242,-0.582l-1.165,-1.165c-0.209,-0.202 -0.509,-0.279 -0.79,-0.202c-0.28,0.077 -0.499,0.296 -0.576,0.576c-0.077,0.281 -0,0.581 0.202,0.79l1.164,1.165c0.155,0.155 0.364,0.242 0.583,0.242c0.218,-0 0.428,-0.087 0.582,-0.242l0,0Z"
    style="fill-rule:nonzero;" />
<path
    d="M12.768,6.303c-2.354,-0 -4.53,1.256 -5.707,3.295c-1.178,2.039 -1.178,4.552 -0,6.591c1.177,2.039 3.353,3.295 5.707,3.295c1.858,-0.004 3.629,-0.791 4.877,-2.167c0.312,-0.347 0.588,-0.725 0.824,-1.128c0.3,-0.517 0.53,-1.071 0.684,-1.648c0.066,-0.264 0.115,-0.544 0.156,-0.824c0.066,-0.547 0.066,-1.101 0,-1.648c-0.041,-0.28 -0.09,-0.56 -0.156,-0.824c-0.154,-0.577 -0.384,-1.131 -0.684,-1.647c-0.236,-0.403 -0.512,-0.781 -0.824,-1.129c-1.248,-1.376 -3.019,-2.163 -4.877,-2.167l0,0.001Zm2.719,10.71l-1.895,-0l-0,-0.824l2.851,-0c-0.281,0.315 -0.603,0.592 -0.956,0.824l-0,-0Zm1.936,-2.472l-3.831,0l-0,-0.824l4.045,0c-0.041,0.282 -0.113,0.558 -0.214,0.824l-0,-0Zm0.214,-2.472l-4.045,0.001l-0,-0.824l3.831,-0c0.101,0.266 0.173,0.542 0.214,0.824l-0,-0.001Zm-4.045,-2.471l-0,-0.824l1.895,0c0.353,0.232 0.675,0.509 0.956,0.824l-2.851,0Z"
    style="fill-rule:nonzero;" />

<ellipse cx="69.891" cy="70.027" rx="17.266" ry="17.224"
    style="fill:none;stroke:#000;stroke-width:0.14px;" />
<g>
    <path d="M65.686,71.812l-18.173,-11.134l22.559,9.321"
        style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
    <path d="M68.255,65.623l-20.742,-4.945l22.559,9.321"
        style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
</g>
<g>
    <path d="M65.686,68.187l-4.958,-20.692l9.344,22.504"
        style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
    <path d="M71.889,65.623l-11.161,-18.128l9.344,22.504"
        style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
</g>
<g>
    <path d="M63.202,69.973l-17.698,-24.544l24.605,24.544"
        style="fill:#999;fill-rule:nonzero;stroke:#999;stroke-width:0.14px;" />
    <path d="M70.109,63.083l-24.605,-17.654l24.605,24.544"
        style="fill:#c2c2c2;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
</g>
<path d="M71.706,65.61l20.742,-4.945l-22.56,9.322"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M74.275,71.799l18.173,-11.134l-22.56,9.322"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M68.071,65.61l11.162,-18.128l-9.345,22.505"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M74.275,68.174l4.958,-20.692l-9.345,22.505"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M69.915,63.133l24.605,-17.655l-24.605,24.545"
    style="fill:#999;fill-rule:nonzero;stroke:#999;stroke-width:0.14px;" />
<path d="M76.822,70.023l17.698,-24.545l-24.605,24.545"
    style="fill:#c2c2c2;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M69.915,70.023l-4.892,-4.881l4.892,-30.142"
    style="fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M69.915,70.023l4.892,-4.881l-4.892,-30.142"
    style="fill:#fff;fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M74.314,71.813l4.958,20.692l-9.344,-22.504"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M68.111,74.377l11.161,18.128l-9.344,-22.504"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M74.314,68.188l18.173,11.134l-22.559,-9.321"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M71.745,74.377l20.742,4.945l-22.559,-9.321"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M76.798,70.027l17.698,24.544l-24.605,-24.544"
    style="fill:#999;fill-rule:nonzero;stroke:#999;stroke-width:0.14px;" />
<path d="M69.891,76.917l24.605,17.654l-24.605,-24.544"
    style="fill:#c2c2c2;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M69.891,70.027l4.893,-4.88l30.216,4.88"
    style="fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M69.891,70.027l4.893,4.88l30.216,-4.88"
    style="fill:#fff;fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M68.294,74.39l-20.742,4.945l22.56,-9.322"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M65.725,68.201l-18.173,11.134l22.56,-9.322"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M71.929,74.39l-11.162,18.128l9.345,-22.505"
    style="fill:#b4b4b4;fill-rule:nonzero;stroke:#b4b4b4;stroke-width:0.14px;" />
<path d="M65.725,71.826l-4.958,20.692l9.345,-22.505"
    style="fill:#e1e1e1;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M70.085,76.867l-24.605,17.655l24.605,-24.545"
    style="fill:#999;fill-rule:nonzero;stroke:#999;stroke-width:0.14px;" />
<path d="M63.178,69.977l-17.698,24.545l24.605,-24.545"
    style="fill:#c2c2c2;fill-rule:nonzero;stroke:#c2c2c2;stroke-width:0.14px;" />
<path d="M70.085,69.977l4.892,4.881l-4.892,30.142"
    style="fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M70.085,69.977l-4.892,4.881l4.892,30.142"
    style="fill:#fff;fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M70.109,69.973l-4.893,4.88l-30.216,-4.88"
    style="fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
<path d="M70.109,69.973l-4.893,-4.88l-30.216,4.88"
                style="fill:#fff;fill-rule:nonzero;stroke:#000;stroke-width:0.14px;" />
        </g>
        <g>
            <g transform="matrix(1,0,0,0.982974,0,1.32269)"><text x="113.199px" y="77.687px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:22.381px;fill:#fff;">E</text>
            </g>
            <g transform="matrix(1,0,0,0.982974,0,1.32803)"><text x="13.555px" y="78.001px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:22.381px;fill:#fff;">W</text>
            </g>
            <g transform="matrix(1,0,0,0.982974,0,2.16893)"><text x="63.249px" y="127.391px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:22.381px;fill:#fff;">S</text>
            </g>
            <g transform="matrix(1,0,0,0.982974,0,0.483824)"><text x="63.111px" y="28.417px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:22.381px;fill:#fff;">N</text>
            </g>
        </g>
        <g>
            <g transform="matrix(0.707107,0.707107,-0.695068,0.695068,29.255,-8.31145)"><text x="25.306px"
                    y="31.426px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:14.242px;fill:#fff;">NW</text>
            </g>
            <g transform="matrix(0.707107,-0.707107,0.695068,0.695068,-0.835438,86.2786)"><text
                    x="102.815px" y="44.527px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:14.242px;fill:#fff;">NE</text>
            </g>
            <g transform="matrix(0.707107,0.707107,-0.695068,0.695068,99.59,-36.1951)"><text x="95.603px"
                    y="102.995px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:14.242px;fill:#fff;">SE</text>
            </g>
            <g transform="matrix(0.707107,-0.707107,0.695068,0.695068,-70.6276,57.4656)"><text x="31.691px"
                    y="114.967px"
                    style="font-family:'DejaVuSansMono-Bold', 'DejaVu Sans Mono', monospace;font-weight:700;font-size:14.242px;fill:#fff;">SW</text>
            </g>
        </g>
        <g>
            <g transform="matrix(0.382683,-0.92388,0.90815,0.376168,24.9888,100.299)"><text x="87.144px"
                    y="31.72px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">NNE</text>
            </g>
            <g transform="matrix(0.92388,-0.382683,0.376168,0.90815,-12.957,46.9163)"><text x="109.035px"
                    y="56.509px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">ENE</text>
            </g>
            <g transform="matrix(0.92388,0.382683,-0.376168,0.90815,41.3127,-33.0573)"><text x="107.521px"
                    y="88.068px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">ESE</text>
            </g>
            <g transform="matrix(0.382683,0.92388,-0.90815,0.376168,150.861,-8.12016)"><text x="82.905px"
                    y="109.764px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">SSE</text>
            </g>
            <g transform="matrix(0.382683,-0.92388,0.90815,0.376168,-82.9265,124.432)"><text x="50.052px"
                    y="125.337px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">SSW</text>
            </g>
            <g transform="matrix(0.92388,-0.382683,0.376168,0.90815,-34.3985,15.3056)"><text x="17.211px"
                    y="94.927px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">WSW</text>
            </g>
            <g transform="matrix(0.92388,0.382683,-0.376168,0.90815,19.8867,-1.25933)"><text x="15.239px"
                    y="49.783px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">WNW</text>
            </g>
            <g transform="matrix(0.382683,0.92388,-0.90815,0.376168,43.3957,-31.035)"><text x="45.139px"
                    y="17.101px"
                    style="font-family:'DejaVuSansMono', 'DejaVu Sans Mono', monospace;font-size:9.156px;fill:#fff;">NNW</text>
            </g>
        </g>
    </g>
    <defs>
        <linearGradient id="gr`+this.id+`" x1="0" y1="0" x2="1" y2="0" gradientUnits="userSpaceOnUse"
            gradientTransform="matrix(7.34788e-15,-120,120,7.34788e-15,70,130)">
            <stop offset="0" style="stop-color:#ffbf00;stop-opacity:1" />
            <stop offset="1" style="stop-color:#0097ff;stop-opacity:1" />
        </linearGradient>
    </defs>
</svg>`,this.direction={"-90":"W","-67.5":"WNW","-45":"NW","-22.5":"NNW",0:"N","22.5":"NNE",45:"NE","67.5":"ENE",90:"E","112.5":"ESE",135:"SE","157.5":"SSE",180:"S","202.5":"SSW",225:"SW","247.5":"WSW",270:"W"},this.angles={W:"-90",WNW:"-67.5",NW:"-45",NNW:"-22.5",N:"0",NNE:"22.5",NE:"45",ENE:"67.5",E:"90",ESE:"112.5",SE:"135",SSE:"157.5",S:"180",SSW:"202.5",SW:"225",WSW:"247.5",W:"270"},this.element=l,this.dir=l.value,this.angle=this.angles[this.dir],this.isOpen=!1,this.isDragged=!1,this.onOpen=!1,this.canvas=null,this.ctx=null,this.x0=0,this.y0=0,this.x=this.x0,this.y=0,this.last=l.value}.bind(this),this.init(s).then(()=>{this.drawArrow()}),s.addEventListener("focus",function(l){this.addPopover(),this.isOpen=!0,this.onOpen=!0;let o=l.target;o.value in this.angles&&(this.dir=o.value,this.angle=this.angles[o.value],this.drawArrow()),window.addEventListener("click",function(t){t.target!=this.canvas&&t.target!=this.element&&(this.popover.remove(),this.isOpen=!1)}.bind(this)),this.popover.addEventListener("mousedown",function(t){if(this.isOpen){t.currentTarget.matches(":hover")&&(this.isDragged=!this.isDragged);const e=t.currentTarget.getBoundingClientRect();this.x=t.clientX-e.left,this.y=t.clientY-e.top,this.angle=Math.round((Math.atan2(this.y-this.y0,this.x-this.x0)*180/Math.PI+90)/22.5)*22.5,o.value=this.direction[this.angle],this.dir=this.direction[this.angle],this.drawArrow()}}.bind(this)),this.popover.addEventListener("dblclick",function(t){this.isDragged=!1,this.popover.remove(),this.isOpen=!1}.bind(this)),window.addEventListener("mouseup",function(t){t.target==this.canvas&&(window.removeEventListener("mousemove",function(e){}),this.isDragged=!1)}.bind(this)),window.addEventListener("mousemove",function(t){if(t.target.matches(":hover")&&this.isDragged){const e=t.target.getBoundingClientRect();this.x=t.clientX-e.left,this.y=t.clientY-e.top,this.element.value=this.direction[this.angle],this.dir=this.direction[this.angle],this.drawArrow()}}.bind(this))}.bind(this)),this.addPopover=function(){if(this.element.nextSibling.tagName!="DIV"){if(this.element.closest(".popwin")){this.popover=this.element.closest(".popwin");return}this.popover=document.createElement("div"),this.popover.setAttribute("id","popover_"+this.id),this.popover.classList.add("sun"),this.popover.classList.add("popwin"),this.popover.classList.add("bottom"),this.popover.classList.add("align-left"),this.popover.innerHTML=this.tpl,this.element.after(this.popover),this.canvas=this.element.nextSibling.querySelector("canvas"),this.ctx=this.element.nextSibling.querySelector("canvas").getContext("2d"),this.x0=this.popover.offsetWidth/2,this.y0=this.popover.offsetHeight/2,this.isOpen=!0;return}}.bind(this),this.drawArrow=function(){if(!this.isOpen||!(this.dir in this.angles))return;var l=10,o=87;this.onOpen==!1?this.angle=Math.round((Math.atan2(this.y-this.y0,this.x-this.x0)*180/Math.PI+90)/22.5)*22.5:this.onOpen=!1,this.x0=this.popover.offsetWidth/2,this.y0=this.popover.offsetHeight/2,this.ctx.clearRect(0,0,this.popover.clientWidth,this.popover.clientHeight);let t=new Path2D;t.moveTo(o,0),t.lineTo(o+l,-l),t.lineTo(o+l,l),t.lineTo(o,0),t.closePath(),this.ctx.save(),this.ctx.translate(this.x0,this.y0),this.ctx.rotate((this.angle-90)*Math.PI/180),this.ctx.fillStyle="#000000",this.ctx.fill(t),this.ctx.restore(),navigator.vibrate(100),this.element.value!==this.last&&(this.element.dispatchEvent(new Event("change")),this.last=this.element.value)}.bind(this)}var a=document.querySelectorAll("[data-sun]");a.forEach(function(s){new r(s)});
