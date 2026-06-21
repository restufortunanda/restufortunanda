<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Portofolio | TI UIR</title>
    <!-- Google Fonts: Space Grotesk & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>

    <!-- Deep Ocean Neon Lines Grid Background -->
    <div class="ocean-grid-bg"></div>

    <nav class="navbar">
        <div class="nav-logo">NEXUS<span>//TI</span></div>
        <ul class="nav-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#profile-grid">Profile</a></li>
            <li><a href="#todo-app">Tasks</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <button id="theme-toggle" class="btn-theme">🌙 Mode</button>
    </nav>

    <main class="container">
        
        <!-- HERO SECTION: ASYMMETRIC NEO-CYAN CARD -->
        <section id="hero" class="hero-section modern-cyber-card">
            <div class="avatar-frame">
                <img src="WhatsApp Image 2026-06-21 at 19.49.19.jpeg" alt="Developer Avatar" class="profile-img">
            </div>
            <div class="hero-text">
                <div class="badge-status">
                    <span class="pulse-indicator"></span>
                    <span class="badge-title">PORTFOLIO UTAMA</span>
                </div>
                <h2>Halo, Saya Restu Fortu Nanda <span class="neon-text-glow">Mahasiswa TI UIR</span></h2>
                <p class="hero-subtitle">Web Developer | Informatics Engineering Student at UIR</p>
            </div>
        </section>

        <!-- NEW UPPER GRID: ABOUT & EDUCATION SIDE-BY-SIDE -->
        <div id="profile-grid" class="profile-split-grid">
            
            <!-- ABOUT SECTION -->
            <article id="about" class="about-section">
                <h2 class="cyber-section-title"><span>01//</span> Tentang Saya</h2>
                <div class="modern-cyber-card content-padding fill-height">
                    <p class="about-text">Sebagai mahasiswa Teknik Informatika, saya fokus mendalami arsitektur pengembangan aplikasi web berskala modern. Saya mengintegrasikan perancangan antarmuka yang responsif dan estetik di sisi frontend dengan logika backend yang kuat menggunakan PHP dan MySQL untuk menghasilkan platform digital yang andal.</p>
                </div>
            </article>

            <!-- EDUCATION SECTION (TIMELINE) -->
            <section id="education" class="edu-section">
                <h2 class="cyber-section-title"><span>02//</span> Riwayat Pendidikan</h2>
                <div class="timeline-container">
                    
                    <!-- Pendidikan 1 -->
                    <div class="timeline-card modern-cyber-card">
                        <div class="timeline-badge-active"></div>
                        <div class="timeline-header">
                            <span class="timeline-year">2024 - Sekarang</span>
                            <span class="capsule-tag tag-primary">Teknik Informatika</span>
                        </div>
                        <h3 class="timeline-institution">Universitas Islam Riau</h3>
                    </div>

                    <!-- Pendidikan 2 -->
                    <div class="timeline-card modern-cyber-card">
                        <div class="timeline-badge-mute"></div>
                        <div class="timeline-header">
                            <span class="timeline-year">2020 - 2023</span>
                            <span class="capsule-tag tag-secondary">IPA</span>
                        </div>
                        <h3 class="timeline-institution">SMA KUANTAN HILIR SEBRANG</h3>
                    </div>

                </div>
            </section>

        </div>

        <!-- NEW LOWER GRID: SWITCHED POSITIONS (TASKS LEFT, CONTACT RIGHT) -->
        <div class="main-asymmetric-grid">
            
            <!-- TODO APP SECTION (MY TASKS) -->
            <section id="todo-app" class="todo-wrapper">
                <h2 class="cyber-section-title"><span>03//</span> My Tasks</h2>
                <div class="modern-cyber-card content-padding">
                    <form action="proses_todo.php" method="POST" class="todo-inline-form">
                        <input type="text" name="task_text" placeholder="Add a new task..." required>
                        <button type="submit" name="add_task" class="btn-neon-drift square-btn">+</button>
                    </form>

                    <ul id="cyber-todo-list">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM todos ORDER BY id DESC");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $item_status = ($row['completed'] == 1) ? 'state-completed' : 'state-normal';
                            $text_status = ($row['completed'] == 1) ? 'line-through-text' : '';
                        ?>
                            <li class="todo-row <?php echo $item_status; ?>">
                                <a href="proses_todo.php?toggle=<?php echo $row['id']; ?>&status=<?php echo $row['completed']; ?>" class="todo-link-text <?php echo $text_status; ?>">
                                    <?php echo htmlspecialchars($row['task_text']); ?>
                                </a>
                                <a href="proses_todo.php?delete=<?php echo $row['id']; ?>" class="todo-remove-action">
                                    &times;
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>

            <!-- CONTACT SECTION -->
            <section id="contact" class="contact-section">
                <h2 class="cyber-section-title"><span>04//</span> Hubungi Saya</h2>
                <div class="modern-cyber-card content-padding">
                    <form action="proses_kontak.php" method="POST" class="cyber-form">
                        <div class="input-container">
                            <label>Nama Lengkap:</label>
                            <input type="text" name="nama" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="input-container">
                            <label>Email:</label>
                            <input type="email" name="email" placeholder="contoh@email.com" required>
                        </div>
                        <div class="input-container">
                            <label>Pesan:</label>
                            <textarea name="pesan" rows="3" placeholder="Tulis pesan Anda di sini" required></textarea>
                        </div>
                        <div class="btn-container">
                            <button type="submit" name="kirim_pesan" class="btn-neon-drift full-width-btn">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </section>

        </div>

    </main>

    <footer class="cyber-footer">
        <p>&copy; 2026 Oceanic Drift Engine. Lab Assignment Standard V3.</p>
    </footer>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
            themeToggle.textContent = "☀️ Light";
        } else {
            themeToggle.textContent = "🌙 Dark";
        }

        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark');
            if(document.body.classList.contains('dark')) {
                themeToggle.textContent = "☀️ Light";
                localStorage.setItem('theme', 'dark');
            } else {
                themeToggle.textContent = "🌙 Dark";
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>
