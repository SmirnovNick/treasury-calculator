const GOLD_DIV_NUMBER = 3;
const BUTTLE_CHIPS_DIV_NUMBER = 2;
const LOALTY_DIV_NUMBER = 1;

var selects = {
    day1: document.getElementById('selectDay1'),
    day2: document.getElementById('selectDay2'),
    day3: document.getElementById('selectDay3'),
    day4: document.getElementById('selectDay4'),
    day5: document.getElementById('selectDay5'), 
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

var formatter = new Intl.NumberFormat("ru");

selects.day1.onchange = () => setPrice('day1',selects.day1.value);
selects.day2.onchange = () => setPrice('day2',selects.day2.value);
selects.day3.onchange = () => setPrice('day3',selects.day3.value);
selects.day4.onchange = () => setPrice('day4',selects.day4.value);
selects.day5.onchange = () => setPrice('day5',selects.day5.value);

function setPrice(day, map){
    
    divs[day][LOALTY_DIV_NUMBER].innerHTML = maps[map].cost.loalty;      
    divs[day][BUTTLE_CHIPS_DIV_NUMBER].innerHTML = maps[map].cost.buttleChips; 
    divs[day][GOLD_DIV_NUMBER].innerHTML = maps[map].cost.gold;       
    
    setTotalPrice();
}

function setTotalPrice() {
    
    let buttleChips = {
        day1: parseInt(divs['day1'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML),
        day2: parseInt(divs['day2'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML),
        day3: parseInt(divs['day3'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML),
        day4: parseInt(divs['day4'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML),
        day5: parseInt(divs['day5'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML),
        
        sum: function(){
        return this.day1 + this.day2 + this.day3 + this.day4 + this.day5;
        }
    };
    let loalty = {
        day1: parseInt(divs['day1'][LOALTY_DIV_NUMBER].innerHTML),
        day2: parseInt(divs['day2'][LOALTY_DIV_NUMBER].innerHTML),
        day3: parseInt(divs['day3'][LOALTY_DIV_NUMBER].innerHTML),
        day4: parseInt(divs['day4'][LOALTY_DIV_NUMBER].innerHTML),
        day5: parseInt(divs['day5'][LOALTY_DIV_NUMBER].innerHTML),
        
        sum: function(){
        return this.day1 + this.day2 + this.day3 + this.day4 + this.day5;
        }
    };
    let gold = {
        day1: parseInt(divs['day1'][GOLD_DIV_NUMBER].innerHTML),
        day2: parseInt(divs['day2'][GOLD_DIV_NUMBER].innerHTML),
        day3: parseInt(divs['day3'][GOLD_DIV_NUMBER].innerHTML),
        day4: parseInt(divs['day4'][GOLD_DIV_NUMBER].innerHTML),
        day5: parseInt(divs['day5'][GOLD_DIV_NUMBER].innerHTML),
        
        sum: function(){
        return this.day1 + this.day2 + this.day3 + this.day4 + this.day5;
        }
    };
    
    
    divs['total'][LOALTY_DIV_NUMBER].innerHTML = loalty.sum().toLocaleString();      
    divs['total'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML = buttleChips.sum().toLocaleString(); 
    divs['total'][GOLD_DIV_NUMBER].innerHTML = gold.sum().toLocaleString(); 
    
    divs['forOne'][LOALTY_DIV_NUMBER].innerHTML = (Math.ceil(loalty.sum()/30)).toLocaleString();      
    divs['forOne'][BUTTLE_CHIPS_DIV_NUMBER].innerHTML = (Math.ceil(buttleChips.sum()/30)).toLocaleString(); 
    divs['forOne'][GOLD_DIV_NUMBER].innerHTML = (Math.ceil(gold.sum()/30)).toLocaleString();  
    
}