function switchTab(tab) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.form-section').forEach(f => f.classList.remove('active'));
    document.getElementById(tab).classList.add('active');
    event.target.classList.add('active');
}