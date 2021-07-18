const crypto_comp_url = "https://min-api.cryptocompare.com/data/price?fsym=BSV&tsyms=GBP&"
const my_api_key = "bd558eb5933ae0d1ed646689a0ad9cd32f8437b19fdb04d417ea6e67480ce591"  
const my_crypto_url = crypto_comp_url + my_api_key
async function getcc() {
  const response = await fetch(my_crypto_url);
  const data1 = await response.json();
  document.getElementById('prc').textContent=data1

}
getcc();

