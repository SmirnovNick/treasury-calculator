const GOLD_DIV_NUMBER = 3;
const BUTTLE_CHIPS_DIV_NUMBER = 2;
const LOALTY_DIV_NUMBER = 1;
const PRESTIGE_DIV_NUMBER = 4;
const SCORE_DIV_NUMBER = 5;
const DAY_COUNT = 5;
const MAP_COUNT = 6;


var selects = {
    day1: document.getElementById('selectDay1'),
    day2: document.getElementById('selectDay2'),
    day3: document.getElementById('selectDay3'),
    day4: document.getElementById('selectDay4'),
    day5: document.getElementById('selectDay5'), 
    groupCount: document.getElementById('groupCount'), 
}

var inputs = {
    prestige: document.getElementById('prestige'),
}

var options = {
    day1: selects.day1.getElementsByTagName('option'),
    day2: selects.day2.getElementsByTagName('option'),
    day3: selects.day3.getElementsByTagName('option'),
    day4: selects.day4.getElementsByTagName('option'),
    day5: selects.day5.getElementsByTagName('option'), 
}

var divs = {
    day1: document.getElementById('day1').getElementsByTagName('div'),
    day2: document.getElementById('day2').getElementsByTagName('div'),
    day3: document.getElementById('day3').getElementsByTagName('div'),
    day4: document.getElementById('day4').getElementsByTagName('div'),
    day5: document.getElementById('day5').getElementsByTagName('div'),  
    total: document.getElementById('total').getElementsByTagName('div'),
    forOne: document.getElementById('for_one').getElementsByTagName('div'),
}

var currentPrice = {
    day1: {
        gold: 0,
        loalty: 0,
        buttleChips: 0,
        
    },
    day2: {
        gold: 0,
        loalty: 0,
        buttleChips: 0,
        
    },
    day3: {
        gold: 0,
        loalty: 0,
        buttleChips: 0,
        
    },
    day4: {
        gold: 0,
        loalty: 0,
        buttleChips: 0,
        
    },
    day5: {
        gold: 0,
        loalty: 0,
        buttleChips: 0,
        
    },
    
    loaltySum: function(){
        return this.day1.loalty + this.day2.loalty + this.day3.loalty + this.day4.loalty + this.day5.loalty;
    },
    buttleChipsSum: function(){
        return this.day1.buttleChips + this.day2.buttleChips + this.day3.buttleChips + this.day4.buttleChips + this.day5.buttleChips;
    },
    goldSum: function(){
        return this.day1.gold + this.day2.gold + this.day3.gold + this.day4.gold + this.day5.gold;
    },
    
}

var currentPrestige = {
    day1: 0,
    day2: 0,
    day3: 0,
    day4: 0,
    day5: 0,
}





for(let i = 1; i <= DAY_COUNT; i++){
    for(let j = 1; j <= MAP_COUNT; j++){
        options['day' + i][j-1].textContent = maps['map' + j].title.RU;
    }
}

selects.day1.onchange = () => update();
selects.day2.onchange = () => update();
selects.day3.onchange = () => update();
selects.day4.onchange = () => update();
selects.day5.onchange = () => update();
selects.groupCount.onchange = () => setTotalPrice();
inputs.prestige.onchange = () =>  update();


function update(){
    setPrestige();
    
    for(let i = 1; i <= 5; i++){
    setPrice('day'+ i, selects['day' + i].value);
    
    setScore('day'+ i, selects['day' + i].value, currentPrestige['day' + i]);
    
    }
    
    
    
    
     setTotalPrice();
    
    
}


function setPrice(day, map){
 
    currentPrice[day].loalty = maps[map].cost.loalty;
    currentPrice[day].buttleChips = maps[map].cost.buttleChips;
    currentPrice[day].gold = maps[map].cost.gold; 
    
    divs[day][LOALTY_DIV_NUMBER].innerHTML = maps[map].cost.loalty.toLocaleString();      
    divs[day][BUTTLE_CHIPS_DIV_NUMBER].innerHTML = maps[map].cost.buttleChips.toLocaleString(); 
    divs[day][GOLD_DIV_NUMBER].innerHTML = maps[map].cost.gold.toLocaleString();       
    
    setTotalPrice();
}

function setTotalPrice() {
    
    let groupCount = selects.groupCount.value;
    
    divs.total[LOALTY_DIV_NUMBER].innerHTML = currentPrice.loaltySum().toLocaleString();      
    divs.total[BUTTLE_CHIPS_DIV_NUMBER].innerHTML = currentPrice.buttleChipsSum().toLocaleString(); 
    divs.total[GOLD_DIV_NUMBER].innerHTML = currentPrice.goldSum().toLocaleString(); 
    
    divs.forOne[LOALTY_DIV_NUMBER].innerHTML = (Math.ceil(currentPrice.loaltySum()/(10 * groupCount))).toLocaleString();      
    divs.forOne[BUTTLE_CHIPS_DIV_NUMBER].innerHTML = (Math.ceil(currentPrice.buttleChipsSum()/(10 * groupCount))).toLocaleString(); 
    divs.forOne[GOLD_DIV_NUMBER].innerHTML = (Math.ceil(currentPrice.goldSum()/(10 * groupCount))).toLocaleString();  
    
}

function setPrestige() {
    
    let prestige = parseInt(document.getElementById("prestige").value);
    
    let prestigeDelta = Math.round(prestige*0.06)*3;
   
    for(let i = 0; i < DAY_COUNT; i++){
        divs['day' + (i + 1)][PRESTIGE_DIV_NUMBER].innerHTML = currentPrestige['day' + (i + 1)] = prestige + prestigeDelta * i;
    }
    
   
}

function setScore(day, map, prestige){
    
    mapMultiplier = maps[map].multiplier;
    prestigeMultiplier = getPrestigeMultiplier(map, prestige);
    
    divs[day][SCORE_DIV_NUMBER].innerHTML = Math.round(prestige*mapMultiplier*prestigeMultiplier).toLocaleString();      
   
    
}

function getPrestigeMultiplier(map, prestige){
    
    switch (map) {
        case 'map1': 
            return 650;
        case 'map2':
            return 443;
        case 'map3':
            if (prestige < 5000) {
                return 544;
            }else if (prestige < 6000) {
                return 529;  
            }else if (prestige < 7000) {
                return 489;  
            }else if (prestige < 8000) {
                return 474;  
            }else if (prestige > 8000) {
                return 465;  
            }  
        case 'map4':
            if (prestige < 6000) {
                return 490;
            }else if (prestige < 7000) {
                return 479;  
            }else if (prestige < 8000) {
                return 459;  
            }else if (prestige > 8000) {
                return 490;  
            }    
        case 'map5':
            if (prestige < 5000) {
                return 445;
            }else if (prestige >= 5000) {
                return 449;
            }
        case 'map6': 
            return 469;

    }
}