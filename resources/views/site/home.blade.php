<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>RSHP Universitas Airlangga</title>
    <link rel="icon" type="image/png" href="{{ asset('img/rshp.png') }}">
    
    <link rel="stylesheet" href="css/home.css">
    
</head>
<body>
    <header>
        <h1>Rumah Sakit Hewan Pendidikan Unair</h1>
        <p><i>“Melayani dengan profesional, peduli pada satwa dan lingkungan.”</i></p>
        <img src="img/unair-logo-2.png" alt="Logo Universitas Airlangga" width="500">
    </header>
    
    <x-navbar />
    
    <div class="container">
        
        <section>
            <h2>Selamat Datang di RSHP Universitas Airlangga</h2>
            <p>
                <b>Rumah Sakit Hewan Pendidikan (RSHP)</b>
                Universitas Airlangga merupakan pusat pelayanan kesehatan veteriner yang sekaligus menjadi
                <u>fasilitas pendidikan dan penelitian</u>
                di bidang kedokteran hewan.
            </p>
            <div class="video-container">
                <iframe 
                    width="560" 
                    height="315" 
                    src="https://www.youtube.com/embed/rCfvZPECZvE?autoplay=1&mute=1" 
                    title="YouTube video player" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </section>
        

        <section>
            <h2>Jadwal Dokter Jaga</h2>
            <p>Informasi mengenai jadwal dokter jaga di RSHP Universitas Airlangga</p>
            <table>
                <thead> 
                    <tr>
                        <th>Hari</th>
                        <th>Nama Dokter</th>
                        <th>Jam Tugas</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td rowspan="5">Senin</td>
                        <td>Prof. Dr. I. Komang Wiarsa Sardjana, drh.</td>
                        <td>08.30 – 12.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Miyayu S. Sofyan, drh., M.Vet.</td>
                        <td>08.30 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Drh. Lina Susanti, MS., Ph.D.</td>
                        <td>13.00 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Dr. Dony Chrismanto, drh., MS.</td>
                        <td>18.00 – 21.30</td>
                        </tr>
                    <tr>
                        <td>Simeon Marcellino Tantono, drh.</td>
                        <td>23.00 – 07.00</td>
                        </tr>

                    <tr>
                        <td rowspan="5">Selasa</td>
                        <td>Prof. Dr. Wiwik Misaco Yuniarti, drh., M.Kes.</td>
                        <td>08.30 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Dr. Ira Sari Yudaniayanti, drh., M.P.</td>
                        <td>08.30 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Simeon Marcellino Tantono, drh.</td>
                        <td>15.00 – 23.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Dony Chrismanto, drh., M.S.</td>
                        <td>18.00 – 21.30</td>
                        </tr>
                    <tr>
                        <td>Puruh Renzy Amalia, drh.</td>
                        <td>23.00 – 07.00</td>
                        </tr>

                    <tr>
                        <td rowspan="5">Rabu</td>
                        <td>Lianny Nangoi, drh., M.Kes.</td>
                        <td>08.30 – 12.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Ira Sari Yudaniayanti, drh., M.P.</td>
                        <td>08.30 – 16.00</td>
                        </tr>
                    <tr>
                        <td>Abihilal Zikra Taim, drh.</td>
                        <td>15.00 – 23.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Dony Chrismanto, drh., M.S.</td>
                        <td>18.00 – 21.30</td>
                        </tr>
                    <tr>
                        <td>Puruh Renzy Amalia, drh.</td>
                        <td>23.00 – 07.00</td>
                        </tr>

                    <tr>
                        <td rowspan="5">Kamis</td>
                        <td>Dr. Nusdianto Triakoso, drh., M.P.</td>
                        <td>08.30 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Drh. Lina Susanti, M.S., Ph.D.</td>
                        <td>08.30 – 12.00</td>
                        </tr>
                    <tr>
                        <td>Drh. Mirza Atikah Madarina Hisyam, M.Si.</td>
                        <td>13.00 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Puruh Renzy Amalia, drh.</td>
                        <td>15.00 – 23.00</td>
                        </tr>
                    <tr>
                        <td>Abihilal Zikra Taim, drh.</td>
                        <td>23.00 – 07.00</td>
                        </tr>

                    <tr>
                        <td rowspan="6">Jumat</td>
                        <td>Dr. Boedi Setiawan, drh., M.P.</td>
                        <td>08.30 – 12.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Miyayu Soneta Sofyan, drh., M.Vet.</td>
                        <td>08.30 – 12.30</td>
                        </tr>
                    <tr>
                        <td>Drh. Mirza Atikah Madarina Hisyam, M.Si.</td>
                        <td>13.00 – 16.00</td>
                        </tr>
                    <tr>
                        <td>Dr. Dony Chrismanto, drh., M.S.</td>
                        <td>13.00 – 16.30</td>
                        </tr>
                    <tr>
                        <td>Puruh Renzy Amalia, drh.</td>
                        <td>15.00 – 23.00</td>
                        </tr>
                    <tr>
                        <td>Abihilal Zikra Taim, drh.</td>
                        <td>23.00 – 07.00</td>
                        </tr>
                </tbody>
            </table>
        </section>
        
        <section>
            <h2>Visi, Misi, dan Tujuan</h2>
            
            <h3>Visi</h3>
            <p><i>“Menjadi rumah sakit hewan pendidikan bertaraf internasional dengan pelayanan unggul, profesional, dan beretika.”</i></p>

            <h3>Misi</h3>
            <ol>
                <li>Menyelenggarakan layanan kesehatan hewan yang berkualitas.</li>
                <li>Mendukung kegiatan pendidikan dan penelitian di bidang kedokteran hewan.</li>
                <li>Mengedepankan kesejahteraan hewan dan lingkungan.</li>
            </ol>

            <h3>Tujuan</h3>
            <p>RSHP bertujuan meningkatkan kualitas pelayanan kesehatan</p>
        </section>
        
    </div>
</body>
</html>

