function createForm(){
    if((parseInt(document.getElementById("nr_of_options").value) < 2) || (document.getElementById("nr_of_options").value == '')){
        alert("Minimum két opciót adj meg pls!"); 
        return;
    }
    document.getElementById("make_button").disabled = true;
    document.querySelectorAll('.add_button').forEach(function(button){
        //console.log("ENTERED ! ");
        button.disabled = false;
    });
    //console.log(document.getElementById("name").value);
    document.getElementById('nr_of_options').readOnly= true;
    options = parseInt(document.getElementById("nr_of_options").value); /*Globális scopeba kell hogy legyen*/
    max_option = options;
    console.log(options);
    document.getElementById('submitbutton').disabled = false;
    document.getElementById('reset').disabled = false;
    if(options>16){
        alert("Maximum 16 opciót adhat hozzá egy szavazáshoz, ön " + options + " adott meg ezért 16-ra lett állítva a száma");
        options = 16;
    }
    for(let i = 0;i<options;++i){

        /*label létrehozása*/
        let text = document.createElement('label');
        let name = (i+1) + ". opció: "
        let id = "option_"+(i+1);
        text.innerHTML = name + "  ";
        text.classList.add(id);
        //console.log(text);        
        document.getElementById("geninputs").appendChild(text);

        /*szövegmező létrehozása*/
        let input = document.createElement('input');
        //console.log('input');
        input.classList.add(id);
        input.setAttribute('type','text');
        input.setAttribute('maxlength','16');
        input.setAttribute('name',id);
        input.name = id;
        console.log(input.getAttribute('name'));
        input.required = true; 
        //let input =document.createElement(`<input type="text" name="${id}" value="${i + 1}" maxlength="16" class="${id}" required>`);

        document.getElementById("geninputs").appendChild(input);

        /*törlés gomb létrehozása ha 2-nél több opció van*/
        if(options>2){
            let remove = document.createElement('button');
            remove.classList.add(id);
            remove.classList.add("remove_option");
            remove.innerText = name + " törlése";
            document.getElementById("geninputs").appendChild(remove);
            remove.setAttribute("onclick","delete_option('"+id+"')");
        }

        /*sortörés*/
        let br = document.createElement('br');
        br.classList.add(id);
        document.getElementById("geninputs").appendChild(br);
    }
}
/* function add_option(){ TODO: Megcsinálni hogy működjön a törlés a többinél!
    if(options<3){

    }
    ++options;
    let lbl = document.createElement('label');
    lbl.innerHTML = options + ". opció: ";
    lbl.classList.add("option_"+options);
    document.getElementById("geninputs").appendChild(lbl);

    let input = document.createElement('input');
    input.classList.add("option_"+options);
    input.setAttribute('type','text');
    input.setAttribute('maxlength','16');
    input.required = true;
    document.getElementById("geninputs").appendChild(input);

    let remove = document.createElement('button');
    remove.classList.add("option_"+options);
    remove.classList.add("remove_option");
    remove.innerText = options + ". elem törlése";
    document.getElementById("geninputs").appendChild(remove);
    remove.setAttribute("onclick","delete_option('option_"+options+"')");


    let br = document.createElement('br');
    br.classList.add("option_"+options);
    document.getElementById("geninputs").appendChild(br);
}
 */
function delete_option(id){

    document.querySelectorAll("."+id).forEach(function(element){
        element.remove();
    });
    --options;
    document.getElementById("nr_of_options").value = options;


    let current  = parseInt(id.split('_')[1]);
    for(;current<(options+1);++current){
        document.querySelectorAll(".option_"+(current+1)).forEach(function(e){
            e.classList.remove("option_"+(current+1))
            e.classList.add("option_"+current);
            if(e.tagName == 'INPUT'){
                e.setAttribute('name',"option_"+current);
                e.name = "option_"+current;
            }
            if(e.tagName == 'LABEL' || e.tagName == 'BUTTON'){
                e.innerHTML = current + ". opció";
                if(e.tagName == 'BUTTON'){
                    e.innerHTML += " törlése";
                }else if(e.tagName == 'LABEL'){
                    e.innerHTML += ": ";
                }
            }
        });
    }
    --max_option;
    //console.log(options);
    if(options < 3){
        //console.log("belépett az ifbe");
        document.querySelectorAll('.remove_option').forEach(function(button){
            button.remove();
        });
    }

}