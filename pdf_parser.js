var PdfReader = require("./index.js").PdfReader;

new PdfReader().parseFileItems("arabic.pdf", function(err, item){
  if (err)
    callback(err);
  else if (!item)
    callback();
  else if (item.text)
    console.log(item.text);
});