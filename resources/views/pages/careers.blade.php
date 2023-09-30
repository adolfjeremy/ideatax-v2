@extends('layouts.main')

@section('page-style')
    <link rel="stylesheet" href="/assets/css/pages/careers.css">
@endsection

@section('content')
    <section class="career_page">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-column align-items-center heading text-center">
                    <h1>{{ __('careers.heading') }}</h1>
                    <p>{{ __('careers.subheading') }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="job_openings mt-5">
        <div class="container">
            <div class="row">
                @forelse ($careers as $career)
                    <div class="col-12 col-md-3 col-lg-4 mt-2 mb-2">
                        <a href="{{ route('careers-detail',$career->slug) }}" class="card career_item">
                            <h2>
                                {{ $career->title }}
                            </h2>
                            <span>More Details &#8594;</span>
                        </a>
                    </div>
                @empty
                    <div class="col-12 py-5 emptycard card">
                        <div class="row">
                            <div class="col-12 text-center">
                                @if(session()->get('applocale') == "en")
                                <h2>No Current Job Openings</h2>
                                @endif
                                 @if(session()->get('applocale') == "id")
                                <h2>Tidak Ada Lowongan Pekerjaan Saat Ini</h2>
                                @endif
                            </div>
                        </div>
                        <div class="row px-lg-5 mt-4">
                            @if(session()->get('applocale') == "en")
                                <div class="col-12 px-lg-5">
                                    <p>Thank you for visiting our career page. Currently, we do not have any job openings available. However, we're always on the lookout for talented individuals who are passionate about tax to join our team.</p>
                                    <P>At Ideatax, we believe in the power of talent, and we encourage you to stay connected with us. By doing so, you'll be among the first to know when new opportunities arise.</P>
                                    <p>Here are a few ways you can stay in touch:</p>
                                    <ol>
                                        <li>
                                            <strong>Follow Us on Social Media</strong>: Stay connected with us on <a href="https://www.instagram.com/ideatax_idn/" target="_blank" rel="noopener noreferrer">Instagram</a> and <a href="https://www.facebook.com/ideataxconsultant" target="_blank" rel="noopener noreferrer">Facebook</a> to get the latest news, insights, and announcements.
                                        </li>
                                        <li>
                                            <strong>Connect on LinkedIn</strong>: Follow our <a href="https://www.linkedin.com/company/idea-tax/" target="_blank" rel="noopener noreferrer">LinkedIn</a> page to network with our team members and stay informed about our organization's growth.
                                        </li>
                                    </ol>
                                    <p>We appreciate your interest in joining the Ideatax team and look forward to the possibility of working together in the future. In the meantime, if you have any questions or would like to learn more about our company, please don't hesitate to <a href="{{ route('contact') }}">contact us.</a></p>
                                </div>
                            @endif
                            @if(session()->get('applocale') == "id")
                                <div class="col-12 px-lg-5">
                                    <p>Terima kasih telah mengunjungi halaman karier kami. Saat ini, kami tidak memiliki lowongan pekerjaan yang tersedia. Namun, kami selalu mencari individu berbakat yang bersemangat tentang perpajakan untuk bergabung dengan tim kami.</p>
                                    <P>Di Ideatax, kami percaya pada kekuatan talenta, dan kami mendorong Anda untuk tetap terhubung dengan kami. Dengan melakukannya, Anda akan menjadi salah satu yang pertama tahu ketika ada peluang baru muncul.</P>
                                    <p>Berikut beberapa cara Anda dapat tetap terhubung:</p>
                                    <ol>
                                        <li>
                                            <strong>Ikuti Kami di Media Sosial</strong>: Tetap terhubung dengan kami di <a href="https://www.instagram.com/ideatax_idn/" target="_blank" rel="noopener noreferrer">Instagram</a> and <a href="https://www.facebook.com/ideataxconsultant" target="_blank" rel="noopener noreferrer">Facebook</a> untuk mendapatkan berita terbaru, wawasan, dan pengumuman.
                                        </li>
                                        <li>
                                            <strong>Terhubung di LinkedIn</strong>: Ikuti halaman <a href="https://www.linkedin.com/company/idea-tax/" target="_blank" rel="noopener noreferrer">LinkedIn</a> kami untuk menjalin hubungan dengan anggota tim kami dan tetap informasi tentang pertumbuhan organisasi kami.
                                        </li>
                                    </ol>
                                    <p>Kami menghargai minat Anda untuk bergabung dengan tim Ideatax dan menantikan kemungkinan bekerja sama di masa depan. Sementara itu, jika Anda memiliki pertanyaan atau ingin mempelajari lebih lanjut tentang perusahaan kami, jangan ragu untuk  <a href="{{ route('contact') }}">Hubungi Kami.</a></p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforelse
            </div>    
        </div>    
    </section> 
@endsection