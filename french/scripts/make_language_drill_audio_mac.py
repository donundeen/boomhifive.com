#!/usr/bin/env python3
"""
Generate an MP3 language drill from a JSON file of [French, English] pairs.

Requirements (macOS):
1) Built-in `say` TTS (comes with macOS).
2) Python packages:
   pip install pydub
3) FFmpeg for MP3 export:
   brew install ffmpeg

Usage:
    python3 make_language_drill_audio_mac.py \
        --json phrases_for_learning.json \
        --out french_learning_audio.mp3 \
        --fr-voices Amelie Thomas \
        --en-voices Samantha Alex

If you omit voice lists, sensible defaults are used.

Structure per entry:
- 0.5s pleasant tone
- French phrase twice in different voices, with 2s pause between
- 2s pause
- English phrase (different voice)
- 2s pause
- French phrase again (different voice)
- 5s pause
"""

import argparse
import json
import os
import shutil
import subprocess
import tempfile
from pydub import AudioSegment
from pydub.generators import Sine

def check_cmd(cmd):
    return shutil.which(cmd) is not None

def say_to_aiff(text, voice, out_path):
    # Use macOS 'say' to synthesize high-quality non-robotic voices into AIFF
    # `say -v <voice> -o out.aiff --data-format=LEI16@44100 "text"`
    cmd = ["say", "-v", voice, "-o", out_path, "--data-format=LEI16@44100", text]
    subprocess.run(cmd, check=True)

def aiff_to_segment(aiff_path):
    return AudioSegment.from_file(aiff_path, format="aiff")

def pick(lst, i):
    # cycle through list
    return lst[i % len(lst)]

def build_audio(pairs, fr_voices, en_voices):
    # Start with 1s of silence leader
    final_audio = AudioSegment.silent(duration=1000)
    pleasant_tone_hz = 440  # A4
    tone_gen = Sine(pleasant_tone_hz)

    with tempfile.TemporaryDirectory() as td:
        for i, (fr, en) in enumerate(pairs):
            # 0) Pleasant tone 0.5s
            final_audio += tone_gen.to_audio_segment(duration=500)

            # 1) French phrase twice in different voices, with 2s pause between
            fr_voice1 = pick(fr_voices, i * 3 + 0)
            fr_voice2 = pick(fr_voices, i * 3 + 1)

            a1 = os.path.join(td, f"fr1_{i}.aiff")
            a2 = os.path.join(td, f"fr2_{i}.aiff")
            say_to_aiff(fr, fr_voice1, a1)
            say_to_aiff(fr, fr_voice2, a2)
            seg1 = aiff_to_segment(a1)
            seg2 = aiff_to_segment(a2)
            final_audio += seg1 + AudioSegment.silent(duration=2000) + seg2

            # 2) Pause 2s
            final_audio += AudioSegment.silent(duration=2000)

            # 3) English phrase (different voice)
            en_voice = pick(en_voices, i)
            a3 = os.path.join(td, f"en_{i}.aiff")
            say_to_aiff(en, en_voice, a3)
            seg3 = aiff_to_segment(a3)
            final_audio += seg3

            # 4) Pause 2s
            final_audio += AudioSegment.silent(duration=2000)

            # 5) French phrase again (different voice)
            fr_voice3 = pick(fr_voices, i * 3 + 2)
            a4 = os.path.join(td, f"fr3_{i}.aiff")
            say_to_aiff(fr, fr_voice3, a4)
            seg4 = aiff_to_segment(a4)
            final_audio += seg4

            # 6) Pause 5s
            final_audio += AudioSegment.silent(duration=5000)

    return final_audio

def main():
    parser = argparse.ArgumentParser()
    parser.add_argument("--json", required=True, help="Path to JSON file of [[fr,en], ...] pairs")
    parser.add_argument("--out", default="french_learning_audio.mp3", help="Output MP3 path")
    parser.add_argument("--fr-voices", nargs="*", default=["Amelie", "Thomas", "Aurelie"],
                        help="macOS French voices to cycle through")
    parser.add_argument("--en-voices", nargs="*", default=["Samantha", "Alex", "Victoria"],
                        help="macOS English voices to cycle through")
    args = parser.parse_args()

    if not os.path.exists(args.json):
        raise SystemExit(f"JSON not found: {args.json}")

    if not check_cmd("say"):
        raise SystemExit("The 'say' command was not found. This script is intended for macOS.")

    # Load pairs
    with open(args.json, "r", encoding="utf-8") as f:
        pairs = json.load(f)

    # Validate structure
    if not isinstance(pairs, list) or not all(isinstance(x, list) and len(x) == 2 for x in pairs):
        raise SystemExit("JSON must be an array of two-element arrays [French, English].")

    # Build audio
    final_audio = build_audio(pairs, args.fr_voices, args.en_voices)

    # Export MP3
    out_path = args.out
    final_audio.export(out_path, format="mp3")
    print(f"Done. Wrote: {out_path}")

if __name__ == "__main__":
    main()
