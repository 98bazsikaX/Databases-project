/**
 * 
 * @param {String} asd hova irányítson tovább, ha nem string, vagy nem definiált a bemenő érték akkor index.php-ra irányít
 */

function go(){
     window.location.replace(where);
 }

 function dec(){
     time_to_redirect--;
 }

function countdown(){
    while(time_to_redirect!=0){
        setInterval(dec(),1000);
        document.getElementById('counter').innerText = time_to_redirect
    }
}

function redirect(asd){
    /*
    TODO: Megcsinálni!
    */
   where = asd;
    if(typeof where != 'string' || where == undefined){
        where = 'index.php';
    }
    time_to_redirect = 10;
    document.body.innerHTML +='<p><a href="'+where+'">Tovább irányítunk <div id="counter">' + time_to_redirect + '</div> másodperc  múlva</a></p>';

    countdown();
    setInterval(go,10000);
}