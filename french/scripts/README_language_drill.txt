Language Drill Audio Generator (macOS)
====================================

This creates an MP3 from a JSON file of [French, English] pairs with this structure per entry:
- 0.5s tone
- French phrase twice (two different voices), 2s pause between
- 2s pause
- English phrase (different voice)
- 2s pause
- French phrase again (different voice)
- 5s pause

Prereqs (macOS):
- Built-in `say` command (included with macOS)
- Python packages:  pip install pydub
- FFmpeg for mp3 export:  brew install ffmpeg

How to run:
1) Download both this README and the script.
2) Place your JSON file (e.g., phrases_for_learning.json) next to the script.
3) Run:
   python3 make_language_drill_audio_mac.py \
       --json phrases_for_learning.json \
       --out french_learning_audio.mp3 \
       --fr-voices Amelie Thomas Aurelie \
       --en-voices Samantha Alex Victoria

Voice tips (non-robotic):
- French: Amelie (fr-CA), Thomas (fr-FR), Aurelie (fr-FR)
- English: Samantha (en-US), Alex (en-US), Victoria (en-US)

Your MP3 will be written to the path you pass to --out.
