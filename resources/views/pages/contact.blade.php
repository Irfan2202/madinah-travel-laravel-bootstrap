 <section id="contact" class="section-contact " id="contact">
     <div class="container">
         <div class="row">
             <div class="col-lg-8 mx-auto text-center mb-5">
                 <h2 class="display-4 fw-bold mb-4">
                     Hubungi <span class="text-gold">Kami</span>
                 </h2>
                 <p class="lead text-muted">
                     Tim profesional kami siap membantu Anda merencanakan perjalanan spiritual yang berkesan.
                     Hubungi kami untuk konsultasi gratis dan informasi lebih lanjut.
                 </p>
             </div>
         </div>

         <div class="row g-4">
             <div class="col-lg-4">
                 <div class="h-100">
                     <div class="card bg-light border-0 p-4 mb-4">
                         <h4 class="fw-bold mb-4">Informasi Kontak</h4>

                         <div class="contact-info-item mb-3" onclick="callPhone()">
                             <div class="d-flex align-items-center">
                                 <div class="feature-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                     <i class="bi bi-telephone-fill"></i>
                                 </div>
                                 <div>
                                     <div class="fw-bold">Telepon</div>
                                     <div class="text-muted">+62 085721122232</div>
                                 </div>
                             </div>
                         </div>

                         <div class="contact-info-item mb-3" onclick="contactWhatsApp()">
                             <div class="d-flex align-items-center">
                                 <div class="feature-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                     <i class="bi bi-whatsapp"></i>
                                 </div>
                                 <div>
                                     <div class="fw-bold">WhatsApp</div>
                                     <div class="text-muted">+62 085721122232</div>
                                 </div>
                             </div>
                         </div>

                         <div class="contact-info-item mb-3" onclick="sendEmail()">
                             <div class="d-flex align-items-center">
                                 <div class="feature-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                     <i class="bi bi-envelope-fill"></i>
                                 </div>
                                 <div>
                                     <div class="fw-bold">Email</div>
                                     <div class="text-muted">info@almadinahtravel.com</div>
                                 </div>
                             </div>
                         </div>

                         <div class="contact-info-item">
                             <div class="d-flex align-items-start">
                                 <div class="feature-icon me-3" style="width: 50px; height: 50px; font-size: 1.25rem;">
                                     <i class="bi bi-geo-alt-fill"></i>
                                 </div>
                                 <div>
                                     <div class="fw-bold">Alamat</div>
                                     <div class="text-muted">Jl. Raya Haji No. 123, Jakarta Selatan 12345</div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="card bg-gold text-dark p-4">
                         <div class="d-flex align-items-center mb-3">
                             <i class="bi bi-clock-fill me-2 fs-4"></i>
                             <h5 class="fw-bold mb-0">Jam Operasional</h5>
                         </div>
                         <div class="row">
                             <div class="col-6">
                                 <div class="mb-2">
                                     <div>Senin - Jumat</div>
                                     <div class="fw-semibold">08:00 - 20:00</div>
                                 </div>
                                 <div class="mb-2">
                                     <div>Sabtu</div>
                                     <div class="fw-semibold">08:00 - 17:00</div>
                                 </div>
                                 <div>
                                     <div>Minggu</div>
                                     <div class="fw-semibold">09:00 - 15:00</div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="col-lg-8">
                 <div class="card border-0 shadow-lg p-4">
                     <h4 class="fw-bold mb-3">Kirim Pesan</h4>
                     <p class="text-muted mb-4">Isi form di bawah ini dan tim kami akan segera menghubungi Anda via
                         WhatsApp.</p>

                     <form id="contactForm">
                         <div class="row g-3 mb-3">
                             <div class="col-md-6">
                                 <label for="name" class="form-label fw-semibold">Nama Lengkap *</label>
                                 <input type="text" class="form-control form-control-lg" id="name" required>
                             </div>
                             <div class="col-md-6">
                                 <label for="email" class="form-label fw-semibold">Email *</label>
                                 <input type="email" class="form-control form-control-lg" id="email" required>
                             </div>
                         </div>
                         <div class="mb-4">
                             <label for="message" class="form-label fw-semibold">Pesan *</label>
                             <textarea class="form-control" id="message" rows="6" required
                                 placeholder="Tuliskan pertanyaan atau kebutuhan Anda mengenai paket haji/umroh..."></textarea>
                         </div>
                         <button type="submit" class="btn btn-gold btn-lg w-100">
                             <i class="bi bi-send-fill me-2"></i>
                             Kirim via WhatsApp
                         </button>
                     </form>
                 </div>
             </div>
         </div>

         <div class="row mt-5">
             <div class="col-lg-10 mx-auto">
                 <div class="card bg-light border-0 p-4 text-center">
                     <h4 class="fw-bold mb-4">Butuh Respon Cepat?</h4>
                     <div class="row g-3">
                         <div class="col-md-6">
                             <button class="btn btn-success btn-lg w-100" onclick="contactWhatsApp()">
                                 <i class="bi bi-whatsapp me-2"></i>
                                 Chat WhatsApp Sekarang
                             </button>
                         </div>
                         <div class="col-md-6">
                             <button class="btn btn-outline-gold btn-lg w-100" onclick="callPhone()">
                                 <i class="bi bi-telephone-fill me-2"></i>
                                 Telepon Langsung
                             </button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
