var oper = '';
var point = null;
var build = "";
var evaluated = '';
var str = "";
var eq = true;

function add(num = 0){
	var div = document.getElementById("calculator-screen");
	build = build + oper + num;

	if(oper === '' && div.innerHTML != '0' && eq == null){

		div.innerHTML = div.innerHTML + num;
	}else{
		div.innerHTML = num;
		eq = null;
	}


	oper = '';


}
function operation(sign){

		oper = sign;
		point = null;
		if(build !== ''){
			var div = document.getElementById("calculator-screen");
			div.innerHTML = eval(build);
		}





}

function dot(){

	if(point == null){
		point = '.';
		var div = document.getElementById("calculator-screen");
		div.innerHTML = div.innerHTML + point;
		build = build + point;
	}

}


function clean(){

	var div = document.getElementById("calculator-screen");
	div.innerHTML = '0';
	point = null;
	oper = '';
	build = "";
}
function raiz(){

	var div = document.getElementById("calculator-screen");
	build = "Math.sqrt("  + div.innerHTML + ")" ;
	equals();

}
function sen(){

	var div = document.getElementById("calculator-screen");
	build = "Math.sin("  + div.innerHTML + ")" ;
	equals();

}
function cos(){

	var div = document.getElementById("calculator-screen");
	build = "Math.cos("  + div.innerHTML + ")" ;
	equals();

}
function equals(){

	var div = document.getElementById("calculator-screen");
	div.innerHTML = eval(build);
	str = build + "=" + div.innerHTML;
	build = div.innerHTML;
	oper = '';
	point = null;
	eq = true;

	var getUrl = window.location;
	var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + '/Tarea7Calculadora/calculadora/guardar';

	post(baseUrl,{calculo: str, resultado: build});
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
