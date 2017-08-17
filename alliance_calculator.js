var maps = {
    map1: {
        titleRU: "1sx nmqwvv ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 0,
            gold: 0,
            loalty: 0,
        },
    },
    map2: {
        titleRU: "1 ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 0,
            gold: 0,
            loalty: 0,
        },
    },
    map3: {
        titleRU: "1 ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 0,
            gold: 0,
            loalty: 0,
        },
    },
    map4: {
        titleRU: "1 ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 0,
            gold: 400000,
            loalty: 25000,
        },
    },
    map5: {
        titleRU: "1 ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 175000,
            gold: 800000,
            loalty: 75000,
        },
    },
    map6: {
        titleRU: "1 ghbdtn",
        titleEN: "",
        multiplier: "",
        cost: {
            buttleChips: 200000,
            gold: 500000,
            loalty: 3000000,
        },
    },    
};

var day1= document.getElementById('day01'); 
var jsd = day1.childNodes;

document.getElementById('day1_select').onchange = function () {
    
    alert(this.id);
    document.getElementById("day1_gold").innerHTML = jsd;
    alert(document.getElementById("day1_gold").innerHTML);
}