//https://tonejs.github.io/

$(document).ready(function() {
  let osc1 = false;
  let lfo = false;
  let gainlfo = false;

  let oscs = [];
  let lfos = [];
  let gainlfos = [];

  let setupdone = false;

  let numnotes = 10;
  let lfofreqstart = 10;
  let lfofreqdif = .1;
  let gainlfofreqstart = 70;
  let gainlfofreqdif = .1;

  $("#start").click(startaudio);
  $("#stop").click(stopaudio);
  $("#toggle").click(toggleaudio);
  $("#button1").click(button1);


  function setup() {
    if (setupdone) {
      return;
    }
    setupdone = true;

    
    let lfofreq = lfofreqstart;
    let gainlfofreq = gainlfofreqstart;
    for (let i = 0; i < numnotes; i++) {
      oscs[i] = new Tone.Oscillator(440, "sine").toDestination();
      /*
    signal = new Tone.Signal({
      value: 300,
      units: "frequency"
    }).connect(osc1.frequency);
    */
      console.log(oscs[i].volume.value);
      lfos[i] = new Tone.LFO(s2h(lfofreq), 110, 440);
      gainlfos[i] = new Tone.LFO(s2h(gainlfofreqstart), 0, -48);
      //    lfo.connect(signal.input);
      lfos[i].connect(oscs[i].frequency);
      gainlfos[i].connect(oscs[i].volume);
      
      lfofreq +=lfofreqdif;
      gainlfofreq += gainlfofreqdif;
    }
  }

  function startaudio() {
    setup();
    oscs.map(osc=>osc.start());
    lfos.map(lfo=>lfo.start());
    gainlfos.map(gainlfo=>gainlfo.start());
  }

  function stopaudio() {
    setup();
    oscs.map(osc=>osc.stop());
  }

  function toggleaudio() {
    setup();
    if (osc1.state == "started") {
      stopaudio();
    } else {
      startaudio();
    }
  }

  function button1() {
  }

  function s2h(secs) {
    // seconds to hs
    // for very long cycles (eg 200 seconds), what's that in cycles/second?
    return 1 / secs;
  }
});
