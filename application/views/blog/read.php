<?php $this->load->view('_templates/public/header'); ?>

    <!-- Sticky Reading Progress -->
    <div class="fixed top-0 left-0 w-0 h-1 bg-emerald-500 z-[60] transition-all duration-100" id="progress-bar"></div>

    <!-- Article Header -->
    <section class="relative pt-32 pb-20 bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
             <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-slate-900/30 z-10"></div>
             <?php if(!empty($post->gambar)): ?>
                <img src="<?= base_url($post->gambar) ?>" class="w-full h-full object-cover opacity-50 blur-sm scale-110">
             <?php else: ?>
                <div class="w-full h-full bg-slate-800"></div>
             <?php endif; ?>
        </div>
        
        <div class="container mx-auto px-6 relative z-10 max-w-4xl text-center">
            <span class="inline-block px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-lg uppercase tracking-wider mb-6 shadow-lg shadow-emerald-500/20">
                <?= $post->kategori ?? 'Berita' ?>
            </span>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-tight drop-shadow-lg">
                <?= $post->judul ?>
            </h1>
            
            <div class="flex flex-wrap items-center justify-center gap-6 text-slate-300 text-sm font-medium">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-slate-700 flex items-center justify-center text-white font-bold">
                        <?= substr($author->first_name ?? 'A', 0, 1) ?>
                    </div>
                    <span><?= $author->first_name ?? 'Admin' ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-calendar-line"></i>
                    <span><?= date('d F Y', strtotime($post->tanggal)) ?></span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="ri-eye-line"></i>
                    <span><?= $post->views ?> Views</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white min-h-screen">
        <div class="container mx-auto px-6 max-w-5xl">
            <div class="grid lg:grid-cols-12 gap-12">
                <!-- Main Article -->
                <div class="lg:col-span-8">
                    <?php if(!empty($post->gambar)): ?>
                        <div class="rounded-3xl overflow-hidden shadow-2xl shadow-slate-200 mb-10 -mt-24 relative z-20 border-4 border-white">
                            <img src="<?= base_url($post->gambar) ?>" class="w-full h-auto">
                        </div>
                    <?php endif; ?>

                    <article class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-slate-900 prose-a:text-emerald-600 hover:prose-a:text-emerald-500 prose-img:rounded-2xl">
                        <?= $post->isi ?>
                    </article>

                    <!-- Share & Tags -->
                    <div class="mt-12 pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="flex gap-2">
                            <span class="text-sm font-bold text-slate-400 uppercase mr-2 mt-2">Tags:</span>
                            <a href="#" class="px-3 py-1 bg-slate-50 text-slate-600 rounded-lg text-sm font-semibold hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Sekolah</a>
                            <a href="#" class="px-3 py-1 bg-slate-50 text-slate-600 rounded-lg text-sm font-semibold hover:bg-emerald-50 hover:text-emerald-600 transition-colors">Pendidikan</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-bold text-slate-400 uppercase">Share:</span>
                            <?php 
                                $share_url = urlencode(current_url());
                                $share_title = urlencode($post->judul);
                            ?>
                            <div class="flex gap-2">
                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_url ?>" target="_blank" title="Share on Facebook" class="w-10 h-10 rounded-full bg-[#1877F2] text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <!-- Twitter / X -->
                                <a href="https://twitter.com/intent/tweet?text=<?= $share_title ?>&url=<?= $share_url ?>" target="_blank" title="Share on X" class="w-10 h-10 rounded-full bg-black text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                                <!-- WhatsApp -->
                                <a href="https://api.whatsapp.com/send?text=<?= $share_title ?>%20<?= $share_url ?>" target="_blank" title="Share on WhatsApp" class="w-10 h-10 rounded-full bg-[#25D366] text-white flex items-center justify-center hover:scale-110 transition-transform">
                                    <i class="ri-whatsapp-line"></i>
                                </a>
                                <!-- Copy Link (Generic/Instagram workaround) -->
                                <button onclick="copyToClipboard('<?= current_url() ?>')" title="Copy Link" class="w-10 h-10 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center hover:bg-slate-300 hover:scale-110 transition-transform">
                                    <i class="ri-link"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Comments Section (Simple) -->
                    <div class="mt-16 bg-slate-50 rounded-3xl p-8 border border-slate-100">
                        <h3 class="text-2xl font-bold text-slate-900 mb-8"><i class="ri-chat-1-line text-emerald-500 mr-2"></i> Komentar (<?= count($comments) ?>)</h3>
                        
                        <!-- List -->
                        <div class="space-y-6 mb-10">
                            <?php if(!empty($comments)): ?>
                                <?php foreach($comments as $comment): ?>
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white border border-slate-200 flex flex-shrink-0 items-center justify-center font-bold text-emerald-600">
                                        <?= substr($comment->name, 0, 1) ?>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <h5 class="font-bold text-slate-900"><?= $comment->name ?></h5>
                                            <span class="text-xs text-slate-400">• <?= date('d M Y', strtotime($comment->created_at)) ?></span>
                                        </div>
                                        <p class="text-slate-600 text-sm leading-relaxed"><?= $comment->body ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-center text-slate-400 italic">Belum ada komentar.</p>
                            <?php endif; ?>
                        </div>

                        <!-- Form -->
                        <h4 class="font-bold text-lg text-slate-900 mb-4">Tulis Komentar</h4>
                        <?= form_open('blog/post_comment') ?>
                            <input type="hidden" name="id_post" value="<?= $post->id_post ?>">
                            <input type="hidden" name="slug" value="<?= $post->slug ?>">
                            <div class="grid md:grid-cols-2 gap-4 mb-4">
                                <input type="text" name="name" placeholder="Nama Lengkap" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 outline-none" required>
                                <input type="email" name="email" placeholder="Email (Opsional)" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 outline-none">
                            </div>
                            <textarea name="body" rows="4" placeholder="Tulis tanggapanmu disini..." class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 outline-none mb-4" required></textarea>
                            <button type="submit" class="px-8 py-3 bg-emerald-600 text-white font-bold rounded-xl hover:bg-emerald-700 transition-colors shadow-lg shadow-emerald-600/20">Kirim Komentar</button>
                        <?= form_close() ?>
                    </div>
                </div>

                <!-- Sidebar (Shared with Index but adjusted) -->
                <div class="lg:col-span-4 space-y-8">
                     <!-- Recent Posts Widget -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 top-24 sticky">
                        <h4 class="font-bold text-lg text-slate-900 mb-6 flex items-center gap-2">
                            <span class="w-1 h-6 bg-emerald-500 rounded-full"></span> Artikel Terbaru
                        </h4>
                        <div class="space-y-6">
                            <?php if(!empty($recent_posts)): ?>
                                <?php foreach($recent_posts as $recent): ?>
                                <a href="<?= base_url('blog/read/'.$recent->slug) ?>" class="flex gap-4 group">
                                    <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0">
                                        <img src="<?= !empty($recent->gambar) ? base_url($recent->gambar) : 'https://via.placeholder.com/150' ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block mb-1"><?= date('d M Y', strtotime($recent->tanggal)) ?></span>
                                        <h5 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-emerald-600 transition-colors line-clamp-2">
                                            <?= $recent->judul ?>
                                        </h5>
                                    </div>
                                </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Reading Progress Bar
        window.onscroll = function() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("progress-bar").style.width = scrolled + "%";
        };

        // Copy Clipboard with Fallback
        function copyToClipboard(text) {
            if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(text);
                return;
            }
            navigator.clipboard.writeText(text).then(function() {
                showCopySuccess();
            }, function(err) {
                console.error('Async: Could not copy text: ', err);
                fallbackCopyTextToClipboard(text);
            });
        }

        function fallbackCopyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;
            
            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                if(successful) showCopySuccess();
                else console.error('Fallback: Copying text command was ' + msg);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }

            document.body.removeChild(textArea);
        }

        function showCopySuccess() {
            if(typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Tautan disalin!',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                alert('Tautan berhasil disalin!');
            }
        }

        // View counter - increment after 30 seconds of reading
        (function() {
            const postId = <?= $post->id_post ?>;
            const viewDelay = 30; // seconds
            let viewCounted = false;
            
            setTimeout(function() {
                if (!viewCounted) {
                    viewCounted = true;
                    fetch('<?= base_url("blog/increment_view") ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'id_post=' + postId
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status && data.new_views) {
                            // Update view count display
                            const viewElement = document.querySelector('.ri-eye-line')?.parentElement?.querySelector('span');
                            if (viewElement) {
                                viewElement.textContent = data.new_views + ' Views';
                            }
                        }
                    })
                    .catch(err => console.log('View count error:', err));
                }
            }, viewDelay * 1000);
        })();
    </script>
<?php $this->load->view('_templates/public/footer'); ?>
