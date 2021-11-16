function test(){
    alert("hello");
}
window.addEventListener("resize", hideMenus); 
function getImage(input, imageContainer){

    var files = input.files;
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById(imageContainer).src = fr.result;
        }
        fr.readAsDataURL(files[0]);

        //set style remove picture button 
        document.getElementById('removePic').style = "";
        document.getElementById('removePic').className = "marginBottom";
    }
}


function removePicture(removeBtn, input, imageContainer){
   var img = document.getElementById(imageContainer);
   var input = document.getElementById(input);
    img.src = "";
    input.value="";
    removeBtn.className = "hidden";
}

function notification(){
    var no = document.getElementById('notification');
    var noParent = document.getElementById('parentNotification');
    noParent.className = "sticky";
    console.log(noParent);
    setInterval(setOpacity, 1000);
}

var opacityCnt = 100;

notification();
function setOpacity() {

    var no = document.getElementById('notification');
    var noParent = document.getElementById('parentNotification');
    
    if(opacityCnt==0){
        noParent.className = "hidden";
        noParent.style = "";
    }
    else{
        noParent.style.opacity = opacityCnt-=20;
    }
    
}


function getLetters(){
    //get letter count
    var letterCnt = ((document.getElementById("tweet_text").value).length);

    //update lettercount
    var currLetters = document.getElementById("current_letters");
    currLetters.innerHTML = letterCnt + "/255";

    //get colors of current_letters
    
    
    //set color of current letters based on number
    if(letterCnt >150){
        document.getElementById("current_letters").style.backgroundColor="yellow";
        document.getElementById("current_letters").style.color = "gray";
    }
    else{
        document.getElementById("current_letters").style.color = "";
        document.getElementById("current_letters").style.backgroundColor="";
    }

    if(letterCnt>200){
        document.getElementById("current_letters").style.backgroundColor="red";
        document.getElementById("current_letters").style.color = "white";
    }

    checkMention();

}

var collect = false;
var mention = "undefined";
var mentions = "";
var lastCnt = 0;
var lastLetter = "";

function checkMention(){
    
    var letterCnt = ((document.getElementById("tweet_text").value).length);
    var text = document.getElementById("tweet_text").value;
    var currentLetter = text[letterCnt-1];
    if(currentLetter==" "){
        collect=false;
        mention="undefined";
        suggestionBoxDisappear();
    }
    //colect mention
    if(collect == true){
        
        //get everything after the @
        if(lastCnt>letterCnt){
            //remove letter on backspace
           mention = mention.slice(0, -1);
           if(lastLetter=="@"){
                suggestionBoxDisappear();
                mention="undefined";
                collect=false; 
           }
           
        }
        else{
            //add letter
            if(currentLetter!= " " && currentLetter!="@"){
                (mention += currentLetter);
            }
        }

        
        console.log("mention: " + mention);

        getResults(removeUndefined(mention));
    }
    //there's a mention
    if(currentLetter == '@'){
        collect = true;
    }
    //console.log("collect " + collect);

    
    lastCnt = letterCnt;
    lastLetter = currentLetter;
}

function suggestionBoxAppear(){

    document.getElementById("suggestions").className = "";
}

function suggestionBoxDisappear(){
    document.getElementById("suggestions").className = "hidden";
}

function removeUndefined(str){
    var collect = "";
    var finalword="";
    var collectletter = true;
    for(var i =0; i<str.length;i++){

        if(collectletter){
        collect += str[i];
            if(collect=="undefined"){
                collectletter=false;
            }
        }else{
            finalword+=str[i];
        }
    }

    return finalword;
}

function removeLastLetter(str){
    return str.slice(0, -1);
}

function getResults(mention){
    emptydropdownbox();
    $.ajax({
        type: 'GET',
        url: "getuser/" + mention,
       
        success: function(data)
        {
            result=$.parseJSON( data );
            dropdownbox(result);           
        }
    });
    
}

function dropdownbox(result){
    
    suggestionBoxAppear();
    for(var i=0; i<result.length; i++){
        $("#users").append(
    '<li onclick="addUsernameToTextbox(this.id)" id="' + result[i]['username'] +'" class="bg-blue-200 px-3 py-1 mt-1 mb-1 rounded-xl flex hover:bg-white" style=" user-select: none;"> <img width="45"height="40" src="/storage/' + result[i]["avatar"] +'" alt="" class="rounded-full mr-2"><h1 class="text-gray-500">' + result[i]["name"] + '<p class="text-sm text-blue-400">@' + result[i]["username"] + '</p></h1></li>');
    }
}

function emptydropdownbox(){
    $("#users").empty();
}

function addUsernameToTextbox(u){

    collect=false;
    mention = "undefined";
    emptydropdownbox();
    suggestionBoxDisappear();
    emptyMention();
   $("#tweet_text").val($("#tweet_text").val() + u + " ");
    getLetters();
    
}

function emptyMention(){
    //get last position of textbox
    //walk back 
    //delete characters up til '@'

    var letterCnt = ((document.getElementById("tweet_text").value).length);
    var text = document.getElementById("tweet_text").value;
    var currentLetter = text[letterCnt-1];
    var result = "";
    while(currentLetter!= '@'){
        document.getElementById("tweet_text").value = document.getElementById("tweet_text").value.slice(0, -1);
        letterCnt = ((document.getElementById("tweet_text").value).length);
        text = document.getElementById("tweet_text").value;
        currentLetter = text[letterCnt-1];
    }
    
}

var display = false;
function showMenu(){
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

    if(width<1100){
        var chosenMenu = document.getElementById('minisidebar');
        if(!display){
            chosenMenu.style.display = "flex";
            display = true;
        }else{
            chosenMenu.style.display = "none";
            display = false;
        }
    }
    else{
        chosenMenu.style.display = "none";
        display = false;
    }
    
    
}

var displayf = false;
function showMenuFriends(){
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(width<1100){
        var chosenMenu = document.getElementById('mini');
        if(!displayf){
            chosenMenu.style.display = "inline";
            displayf = true;
        }else{
            chosenMenu.style.display = "none";
            displayf = false;
        }
    }
    else{
        chosenMenu.style.display = "none";
        displayf = false; 
    }
    
}

function hideMenus(){
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if(width>=1100){
        var chosenMenu = document.getElementById('mini');
        chosenMenu.style.display = "none";
        displayf = false; 

        var chosenMenu2 = document.getElementById('minisidebar');
        chosenMenu2.style.display = "none";
        display = false;
    }
}
