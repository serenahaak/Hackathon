let sendTransaction = document.getElementById("sendTransaction");
let sendTo = document.getElementById("sendToText");
let amount = document.getElementById("amountText");
let utxoAppend = document.getElementById("utxoAppend");
let loader = document.getElementById("loader");

let txData;
let txid;
let txStatus;
let rawTX;
let utxoArray = [];
let utxoCombinedAmount = 0;
let utxoArrayInput = [];
let openExplorer;

// refresh UI and update utxo data
const updateUtxo = function () {
  while (utxoAppend.firstChild) {
    utxoAppend.removeChild(utxoAppend.firstChild);
  }
  utxoArray.forEach(function (arr) {
    const html = `
        <div id="${
          arr.txid + arr.scriptPubKey + arr.vout + arr.satoshis
        }" style="display: flex; width: 100%">
    
          <div style="min-height: 50px; max-height: 50px; padding: 10px 0px; background-color: rgb(255, 165, 0, 0.3); min-width: 16%"><div style="padding: 10px">${
            arr.satoshis
          }</div> </div>
    
          <div style="word-wrap: break-word; min-height: 50px; max-height: 50px; padding: 10px 0px; background-color: rgba(0, 255, 0, 0.3); min-width: 9%"><div style="padding: 10px">${
            arr.vout
          }</div>
           </div>
    
          <div 
          style="word-wrap: break-word; min-height: 50px; max-height: 50px; padding:10px 0px; background-color: rgba(0, 0, 255, 0.3); cursor: pointer; min-width: 42%"><div style="padding: 10px">${
            arr.txid
          }</div>
          </div>
    
          <div style="word-wrap: break-word; min-height: 50px; max-height: 50px; padding:10px 0px;  background-color: rgba(128,0,128,0.3); min-width: 33%"><div style="padding: 10px">${
            arr.scriptPubKey
          }</div>
            
           </div>
    
      </div> 
        `;
    utxoAppend.insertAdjacentHTML("beforeend", html);
  });
};

// animate utxo DIVs that are removed from utxo array
const animateUtxoDivs = function () {
  utxoArrayInput.forEach(function (a) {
    let section = document.getElementById(
      a.txid + a.script + a.vout + a.amount
    );
    section.style.color = "red";
    section.style.opacity = 0;
    section.style.transition = "opacity 3s linear 2.5s, color 1s linear 0s";
  });
};

// create function to update the UI with timeout to fetch data
const utxoUpdateUI = function () {
  setTimeout(() => {
    utxoData();
  }, 1000);
  setTimeout(() => {
    updateUtxo();
  }, 2500);
};

//successful transaction sequence for total UI update
const txSuccess = function () {
  setTimeout(() => {
    utxoUpdateUI();
    refreshBalance();
    setTimeout(() => {
      loader.style.visibility = "hidden";
      sendTransaction.disabled = false;
    }, 1000);
  }, 4000);
};
