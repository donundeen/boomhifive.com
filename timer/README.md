# Countdown Timer with Break Points

A modern, feature-rich countdown timer application with customizable interval alerts and configurable break points. Perfect for focused work sessions with gentle reminders and strategic breaks.

## Features

### ⏱️ Timer Functionality
- **Customizable Countdown**: Set countdown duration from 1-120 minutes (default: 30 minutes)
- **Interval Alerts**: Regular gentle tones at customizable intervals (default: 1 minute)
- **Break Points**: Add, remove, and position break points where timer pauses with different sounds
- **Real-time Progress**: Visual progress bar and countdown display
- **Smart Pausing**: Timer automatically pauses at break points

### 🔊 Advanced Sound System
- **Gentle Tones**: Soft interval alerts for regular reminders
- **Break Point Sounds**: Distinctive sounds when break points are reached
- **Customizable Sounds**: Choose from Gentle Tone, Bell, Chime, Beep, or None
- **Web Audio API**: High-quality generated sounds (no external files needed)
- **Completion Sounds**: Special celebratory sound when countdown finishes

### 🎯 Break Point Management
- **Add Break Points**: Click "Add Break Point" to create new break points
- **Edit Positions**: Click on break point times to modify their positions
- **Delete Break Points**: Remove unwanted break points with the delete button
- **Visual Feedback**: Break points highlight when reached
- **Default Setup**: Comes with one break point at 15 minutes

### 🎨 Modern UI
- **Responsive Design**: Works perfectly on desktop, tablet, and mobile devices
- **Beautiful Gradient**: Modern gradient background with clean card design
- **Smooth Animations**: Transitions and hover effects for better user experience
- **Status Indicators**: Clear display of timer status and next alerts
- **Dark Mode Support**: Automatically adapts to system dark mode preference

### ⌨️ Keyboard Shortcuts
- **Spacebar**: Start/Pause/Resume timer
- **R Key**: Reset timer

### 💾 Settings Persistence
- **Local Storage**: All settings and break points are automatically saved
- **Customizable Defaults**: Set your preferred countdown duration and interval timing

## Usage

1. **Configure Timer**: Set your countdown duration and alert interval
2. **Add Break Points**: Click "Add Break Point" to create break points at specific times
3. **Choose Sounds**: Select different sounds for intervals and break points
4. **Start Timer**: Click "Start" or press Spacebar to begin countdown
5. **Monitor Progress**: Watch the countdown, progress bar, and next alert timing
6. **Handle Breaks**: Timer pauses at break points - click "Resume" to continue
7. **Enjoy Sounds**: Listen to gentle interval tones and distinctive break sounds

## Technical Details

- **Pure JavaScript**: No external dependencies
- **Web Audio API**: For generating high-quality interval sounds
- **CSS Grid & Flexbox**: Modern responsive layout
- **Local Storage**: Settings persistence
- **Notification API**: Desktop notifications support

## Browser Compatibility

- Chrome 60+
- Firefox 55+
- Safari 11+
- Edge 79+

## File Structure

```
timer/
├── index.html      # Main HTML structure
├── styles.css      # CSS styling and responsive design
├── script.js       # JavaScript timer logic and sound system
└── README.md       # This documentation
```

## Getting Started

Simply open `index.html` in your web browser to start using the timer app. No installation or build process required!
