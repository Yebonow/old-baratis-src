<!DOCTYPE html>
<html lang="en-GB">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
    <title>Baratis CSS</title>
    <style>
      .code {
        border: 1px solid #9a9a9a;
        border-radius: 2.5px;
        font-family: monospace;
        padding: 5px;
        }
      </style>
    </head>
  <body>
    <div class="container">
    <h1>Examples Using the Over-engineered CSS of Baratis.tk</h1>
    <p class="text-grey margin-top-0">This document goes over some of the features of the stylesheet used for all pages of this site.</p>
      <hr>
      <h2>Text Colours</h2>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="text-grey">Grey</span><span class="text-blue">Blue</span><span class="text-red">Red</span><span class="text-black">Black</span><span class="text-white">White</span><span class="text-green">Green</span>'); ?></div>
      <span class="text-grey">Grey</span><span class="text-blue">Blue</span><span class="text-red">Red</span><span class="text-black">Black</span><span class="text-white" style="background-color:#6c6c6c">White</span><span class="text-green">Green</span>
      <h2>Buttons</h2>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<button class="button button-blue">I\'m blue</button><button class="button button-green">I\'m green</button><button class="button button-red">I\'m red</button>'); ?></div>
      <button class="button button-blue">I'm blue</button><button class="button button-green">I'm green</button><button class="button button-red">I'm red</button>
      <h2>Margins</h2>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="margin-top-5">Top 5px</span><span class="margin-right-5">Right 5px</span><span class="margin-bottom-5">Bottom 5px</span><span class="margin-left-5">Left 5px</span>'); ?></div>
      <span class="margin-top-5">Top 5px</span><span class="margin-right-5">Right 5px</span><span class="margin-bottom-5">Bottom 5px</span><span class="margin-left-5">Left 5px</span>
      <p class="text-grey">There's a 0px version btw</p>
      <h2>Floats</h2>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="float-right">Right</span>'); ?></div>
      <span class="float-right">Right</span>
      <br>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="float-left">Left</span>'); ?></div>
      <span class="float-left">Left</span><br>
      <h2>Opacity</h2>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="op-05">0.5 opacity</span>'); ?></div>
      <span class="op-05">0.5 opacity</span>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="op-1">1 opacity</span>'); ?></div>
      <span class="op-1">1 opacity</span>
      <h2>Misc</h2>
      <h4>Rounded edges</h4>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<div class="rounded-edges" style="background:#6a6a6a;color:white;padding:10px">This div has rounded edges</div>'); ?></div>
      <div class="rounded-edges" style="background:#6a6a6a;color:white;padding:10px">This div has rounded edges</div>
      <h4>Vertical alignment</h4>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span><img src="/img/bplus.png" class="vertical-align-middle">Text</span>'); ?></div>
      <span><img src="/img/bplus.png" class="vertical-align-middle">img is vertically aligned to the middle</span>
      <h4>Block</h4>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<span class="display-block">Block span</span>'); ?></div>
      <span class="display-block">Block span</span><span>This span has been pushed to the next line by the block span</span>
      <h4>Inline</h4>
      <div class="code margin-bottom-5"><?php echo htmlspecialchars('<h3 class="display-inline">Inline h3</h3>'); ?></div>
      <h3 class="display-inline">Inline h3</h3><span>&nbsp;This span is on the same line as the inline h3</span>
      <hr>
      <h3 class="display-inline">Want something to be added?</h3><span>&nbsp;Send your suggestions to us in our discord server!</span>
      <br>
      <br>
      </div>