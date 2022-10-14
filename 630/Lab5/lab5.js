// Lab 5 Part 2
// Group: 13
// Rajpreet Singh Dhaliwal (500806532)
// Raymond Xu (500696650)
// Muhammet Koc (500848690)

function detectBrowser(){
    let userAgent = navigator.userAgent;
    let browser;
    
    if (userAgent.match(/firefox|fxios/i)){
        browser = "Firefox";
    }
    else if (userAgent.match(/edg/i)){
        browser = "Microsoft Edge";
    }
    else if(userAgent.match(/chrome|chromium|crios/i)){
        browser = "Chrome";
    }
    else{
        browser = "Error No Browser Dectected";
    }

    document.querySelector("p1").innerText="Dectected Browser is: " + browser;
}