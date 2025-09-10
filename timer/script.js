class CountdownTimer {
    constructor() {
        this.isRunning = false;
        this.isPaused = false;
        this.timeLeft = 0; // in seconds
        this.totalTime = 0; // in seconds
        this.intervalId = null;
        this.nextIntervalTime = 0; // time until next interval alert
        this.breakPoints = [15]; // default break point at 15 minutes elapsed
        this.currentBreakIndex = 0;
        this.breakPointsTriggered = new Set(); // track which break points have been triggered
        
        // Settings
        this.countdownDuration = 30; // minutes
        this.intervalDuration = 1; // minutes
        this.intervalSound = 'gentle';
        this.breakSound = 'break';
        
        // DOM elements
        this.timeDisplay = document.getElementById('timeDisplay');
        this.statusDisplay = document.getElementById('statusDisplay');
        this.progressFill = document.getElementById('progressFill');
        this.nextAlertDisplay = document.getElementById('nextAlertDisplay');
        this.startBtn = document.getElementById('startBtn');
        this.pauseBtn = document.getElementById('pauseBtn');
        this.resumeBtn = document.getElementById('resumeBtn');
        this.resetBtn = document.getElementById('resetBtn');
        this.totalTimeDisplay = document.getElementById('totalTimeDisplay');
        this.remainingTimeDisplay = document.getElementById('remainingTimeDisplay');
        this.nextBreakDisplay = document.getElementById('nextBreakDisplay');
        
        // Settings inputs
        this.countdownDurationInput = document.getElementById('countdownDuration');
        this.intervalDurationInput = document.getElementById('intervalDuration');
        this.intervalSoundSelect = document.getElementById('intervalSound');
        this.breakSoundSelect = document.getElementById('breakSound');
        
        // Break points
        this.breakPointsList = document.getElementById('breakPointsList');
        this.addBreakBtn = document.getElementById('addBreakBtn');
        
        this.initializeEventListeners();
        this.loadSettings();
        this.updateDisplay();
        this.renderBreakPoints();
    }
    
    initializeEventListeners() {
        this.startBtn.addEventListener('click', () => this.start());
        this.pauseBtn.addEventListener('click', () => this.pause());
        this.resumeBtn.addEventListener('click', () => this.resume());
        this.resetBtn.addEventListener('click', () => this.reset());
        this.addBreakBtn.addEventListener('click', () => this.addBreakPoint());
        
        // Settings change listeners
        this.countdownDurationInput.addEventListener('change', () => this.updateSettings());
        this.intervalDurationInput.addEventListener('change', () => this.updateSettings());
        this.intervalSoundSelect.addEventListener('change', () => this.updateSettings());
        this.breakSoundSelect.addEventListener('change', () => this.updateSettings());
    }
    
    updateSettings() {
        this.countdownDuration = parseInt(this.countdownDurationInput.value);
        this.intervalDuration = parseFloat(this.intervalDurationInput.value);
        this.intervalSound = this.intervalSoundSelect.value;
        this.breakSound = this.breakSoundSelect.value;
        
        this.saveSettings();
        
        if (!this.isRunning) {
            this.reset();
        }
    }
    
    saveSettings() {
        const settings = {
            countdownDuration: this.countdownDuration,
            intervalDuration: this.intervalDuration,
            intervalSound: this.intervalSound,
            breakSound: this.breakSound,
            breakPoints: this.breakPoints
        };
        localStorage.setItem('countdownTimerSettings', JSON.stringify(settings));
    }
    
    loadSettings() {
        const saved = localStorage.getItem('countdownTimerSettings');
        if (saved) {
            const settings = JSON.parse(saved);
            this.countdownDuration = settings.countdownDuration || 30;
            this.intervalDuration = settings.intervalDuration || 1;
            this.intervalSound = settings.intervalSound || 'gentle';
            this.breakSound = settings.breakSound || 'break';
            this.breakPoints = settings.breakPoints || [15 * 60];
            
            // Update UI
            this.countdownDurationInput.value = this.countdownDuration;
            this.intervalDurationInput.value = this.intervalDuration;
            this.intervalSoundSelect.value = this.intervalSound;
            this.breakSoundSelect.value = this.breakSound;
        }
    }
    
    start() {
        if (this.isPaused) {
            this.resume();
            return;
        }
        
        this.timeLeft = this.countdownDuration * 60;
        this.totalTime = this.countdownDuration * 60;
        this.nextIntervalTime = this.intervalDuration * 60;
        this.currentBreakIndex = 0;
        this.breakPointsTriggered.clear();
        
        this.isRunning = true;
        this.isPaused = false;
        this.statusDisplay.textContent = 'Running';
        
        this.startBtn.disabled = true;
        this.pauseBtn.disabled = false;
        this.resumeBtn.disabled = true;
        
        this.intervalId = setInterval(() => this.tick(), 1000);
        this.updateDisplay();
    }
    
    pause() {
        this.isRunning = false;
        this.isPaused = true;
        this.statusDisplay.textContent = 'Paused';
        
        this.startBtn.disabled = true;
        this.pauseBtn.disabled = true;
        this.resumeBtn.disabled = false;
        
        clearInterval(this.intervalId);
    }
    
    resume() {
        this.isRunning = true;
        this.isPaused = false;
        this.statusDisplay.textContent = 'Running';
        
        this.startBtn.disabled = true;
        this.pauseBtn.disabled = false;
        this.resumeBtn.disabled = true;
        
        this.intervalId = setInterval(() => this.tick(), 1000);
    }
    
    reset() {
        this.isRunning = false;
        this.isPaused = false;
        this.timeLeft = this.countdownDuration * 60;
        this.totalTime = this.countdownDuration * 60;
        this.nextIntervalTime = this.intervalDuration * 60;
        this.currentBreakIndex = 0;
        this.breakPointsTriggered.clear();
        
        this.statusDisplay.textContent = 'Ready';
        
        this.startBtn.disabled = false;
        this.pauseBtn.disabled = true;
        this.resumeBtn.disabled = true;
        
        clearInterval(this.intervalId);
        this.updateDisplay();
    }
    
    tick() {
        this.timeLeft--;
        this.nextIntervalTime--;
        
        // Check for interval alert
        if (this.nextIntervalTime <= 0) {
            this.playIntervalSound();
            this.nextIntervalTime = this.intervalDuration * 60;
        }
        
        // Check for break points
        this.checkBreakPoints();
        
        this.updateDisplay();
        
        if (this.timeLeft <= 0) {
            this.complete();
        }
    }
    
    checkBreakPoints() {
        // Check all break points to see if we've reached any
        // Break points are stored as elapsed time (minutes), so we need to check if enough time has passed
        this.breakPoints.forEach((breakTimeMinutes, index) => {
            const breakTimeSeconds = breakTimeMinutes * 60;
            const elapsedTime = this.totalTime - this.timeLeft;
            
            if (!this.breakPointsTriggered.has(index) && elapsedTime >= breakTimeSeconds && this.timeLeft > 0) {
                this.triggerBreakPoint(index);
            }
        });
    }
    
    triggerBreakPoint(index) {
        this.pause();
        this.playBreakSound();
        this.highlightBreakPoint(index);
        this.statusDisplay.textContent = 'Break Point!';
        this.breakPointsTriggered.add(index);
        
        // Show break point notification
        if (Notification.permission === 'granted') {
            new Notification('Break Point Reached!', {
                body: `Break point at ${this.formatTime(this.breakPoints[index])}`,
                icon: '/favicon.ico'
            });
        }
    }
    
    highlightBreakPoint(index) {
        const breakPointItems = document.querySelectorAll('.break-point-item');
        if (breakPointItems[index]) {
            breakPointItems[index].classList.add('highlight');
            setTimeout(() => {
                breakPointItems[index].classList.remove('highlight');
            }, 2000);
        }
    }
    
    complete() {
        this.isRunning = false;
        this.isPaused = false;
        this.statusDisplay.textContent = 'Complete!';
        
        this.startBtn.disabled = false;
        this.pauseBtn.disabled = true;
        this.resumeBtn.disabled = true;
        
        clearInterval(this.intervalId);
        this.playCompleteSound();
        
        // Show completion notification
        if (Notification.permission === 'granted') {
            new Notification('Timer Complete!', {
                body: 'Countdown timer has finished.',
                icon: '/favicon.ico'
            });
        }
    }
    
    updateDisplay() {
        this.timeDisplay.textContent = this.formatTime(this.timeLeft);
        this.totalTimeDisplay.textContent = this.formatTime(this.totalTime);
        this.remainingTimeDisplay.textContent = this.formatTime(this.timeLeft);
        
        // Update progress bar
        if (this.totalTime > 0) {
            const progress = ((this.totalTime - this.timeLeft) / this.totalTime) * 100;
            this.progressFill.style.width = `${progress}%`;
        }
        
        // Update next alert display
        if (this.isRunning) {
            this.nextAlertDisplay.textContent = `Next alert in ${this.formatTime(this.nextIntervalTime)}`;
        } else {
            this.nextAlertDisplay.textContent = `Next alert in ${this.formatTime(this.intervalDuration * 60)}`;
        }
        
        // Update next break display
        const elapsedTime = this.totalTime - this.timeLeft;
        const nextUntriggeredBreak = this.breakPoints.find((breakTimeMinutes, index) => 
            !this.breakPointsTriggered.has(index) && elapsedTime < breakTimeMinutes * 60
        );
        
        if (nextUntriggeredBreak !== undefined) {
            const timeUntilBreak = (nextUntriggeredBreak * 60) - elapsedTime;
            this.nextBreakDisplay.textContent = this.formatTime(timeUntilBreak);
        } else {
            this.nextBreakDisplay.textContent = 'None';
        }
        
        // Debug: Show break points in console
        if (this.isRunning) {
            const elapsedTime = this.totalTime - this.timeLeft;
            console.log(`Elapsed: ${Math.floor(elapsedTime/60)}:${Math.floor(elapsedTime%60).toString().padStart(2, '0')}, Break points: [${this.breakPoints.join(', ')}] min, Triggered: [${Array.from(this.breakPointsTriggered).join(', ')}]`);
        }
    }
    
    formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }
    
    // Break point management
    addBreakPoint() {
        const time = prompt('Enter break point time (minutes):', '15');
        if (time && !isNaN(time) && time > 0) {
            const breakTimeMinutes = parseInt(time);
            if (breakTimeMinutes < this.countdownDuration) {
                this.breakPoints.push(breakTimeMinutes);
                this.breakPoints.sort((a, b) => a - b);
                this.renderBreakPoints();
                this.saveSettings();
            } else {
                alert('Break point must be less than total countdown time.');
            }
        }
    }
    
    removeBreakPoint(index) {
        this.breakPoints.splice(index, 1);
        this.renderBreakPoints();
        this.saveSettings();
        this.updateDisplay();
    }
    
    updateBreakPoint(index, newTime) {
        const breakTimeMinutes = parseInt(newTime);
        if (breakTimeMinutes > 0 && breakTimeMinutes < this.countdownDuration) {
            this.breakPoints[index] = breakTimeMinutes;
            this.breakPoints.sort((a, b) => a - b);
            this.renderBreakPoints();
            this.saveSettings();
            this.updateDisplay();
        }
    }
    
    renderBreakPoints() {
        this.breakPointsList.innerHTML = '';
        
        this.breakPoints.forEach((breakTimeMinutes, index) => {
            const breakPointItem = document.createElement('div');
            breakPointItem.className = 'break-point-item';
            breakPointItem.innerHTML = `
                <div class="break-point-time">
                    <label>Break after:</label>
                    <input type="number" value="${breakTimeMinutes}" 
                           min="1" max="${this.countdownDuration - 1}"
                           onchange="timer.updateBreakPoint(${index}, this.value)">
                    <span>minutes elapsed</span>
                </div>
                <div class="break-point-actions">
                    <button class="btn btn-small btn-danger" 
                            onclick="timer.removeBreakPoint(${index})">Delete</button>
                </div>
            `;
            this.breakPointsList.appendChild(breakPointItem);
        });
    }
    
    // Sound system
    playIntervalSound() {
        this.playSound(this.intervalSound);
    }
    
    playBreakSound() {
        this.playSound(this.breakSound);
    }
    
    playCompleteSound() {
        this.playSound('complete');
    }
    
    playSound(soundType) {
        if (soundType === 'none') return;
        
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        
        switch (soundType) {
            case 'gentle':
                this.playGentleTone(audioContext);
                break;
            case 'break':
                this.playBreakTone(audioContext);
                break;
            case 'bell':
                this.playBellSound(audioContext);
                break;
            case 'chime':
                this.playChimeSound(audioContext);
                break;
            case 'beep':
                this.playBeepSound(audioContext);
                break;
            case 'complete':
                this.playCompleteSound(audioContext);
                break;
        }
    }
    
    playGentleTone(audioContext) {
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(440, audioContext.currentTime);
        oscillator.type = 'sine';
        
        gainNode.gain.setValueAtTime(0, audioContext.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.1, audioContext.currentTime + 0.1);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.5);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.5);
    }
    
    playBreakTone(audioContext) {
        // Play a more prominent tone for break points
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(600, audioContext.currentTime);
        oscillator.frequency.exponentialRampToValueAtTime(300, audioContext.currentTime + 0.8);
        oscillator.type = 'triangle';
        
        gainNode.gain.setValueAtTime(0, audioContext.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.2, audioContext.currentTime + 0.1);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 1);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 1);
    }
    
    playBellSound(audioContext) {
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
        oscillator.frequency.exponentialRampToValueAtTime(400, audioContext.currentTime + 0.5);
        
        gainNode.gain.setValueAtTime(0, audioContext.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.3, audioContext.currentTime + 0.1);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 1);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 1);
    }
    
    playChimeSound(audioContext) {
        const frequencies = [523.25, 659.25, 783.99]; // C5, E5, G5
        
        frequencies.forEach((freq, index) => {
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(freq, audioContext.currentTime + index * 0.2);
            oscillator.type = 'sine';
            
            gainNode.gain.setValueAtTime(0, audioContext.currentTime + index * 0.2);
            gainNode.gain.linearRampToValueAtTime(0.2, audioContext.currentTime + index * 0.2 + 0.1);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + index * 0.2 + 1);
            
            oscillator.start(audioContext.currentTime + index * 0.2);
            oscillator.stop(audioContext.currentTime + index * 0.2 + 1);
        });
    }
    
    playBeepSound(audioContext) {
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        
        oscillator.frequency.setValueAtTime(1000, audioContext.currentTime);
        oscillator.type = 'square';
        
        gainNode.gain.setValueAtTime(0, audioContext.currentTime);
        gainNode.gain.linearRampToValueAtTime(0.3, audioContext.currentTime + 0.1);
        gainNode.gain.linearRampToValueAtTime(0, audioContext.currentTime + 0.2);
        
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.2);
    }
    
    playCompleteSound(audioContext) {
        // Play a celebratory ascending scale
        const frequencies = [261.63, 293.66, 329.63, 349.23, 392.00, 440.00, 493.88, 523.25]; // C4 to C5
        
        frequencies.forEach((freq, index) => {
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(freq, audioContext.currentTime + index * 0.15);
            oscillator.type = 'sine';
            
            gainNode.gain.setValueAtTime(0, audioContext.currentTime + index * 0.15);
            gainNode.gain.linearRampToValueAtTime(0.2, audioContext.currentTime + index * 0.15 + 0.05);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + index * 0.15 + 0.3);
            
            oscillator.start(audioContext.currentTime + index * 0.15);
            oscillator.stop(audioContext.currentTime + index * 0.15 + 0.3);
        });
    }
}

// Initialize the timer when the page loads
document.addEventListener('DOMContentLoaded', () => {
    // Request notification permission
    if ('Notification' in window && Notification.permission === 'default') {
        Notification.requestPermission();
    }
    
    // Initialize the timer
    window.timer = new CountdownTimer();
});

// Add keyboard shortcuts
document.addEventListener('keydown', (e) => {
    if (e.code === 'Space') {
        e.preventDefault();
        const startBtn = document.getElementById('startBtn');
        const pauseBtn = document.getElementById('pauseBtn');
        const resumeBtn = document.getElementById('resumeBtn');
        
        if (!startBtn.disabled) {
            startBtn.click();
        } else if (!pauseBtn.disabled) {
            pauseBtn.click();
        } else if (!resumeBtn.disabled) {
            resumeBtn.click();
        }
    } else if (e.code === 'KeyR') {
        e.preventDefault();
        document.getElementById('resetBtn').click();
    }
});