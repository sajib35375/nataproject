@extends('frontend.body.app')

@section('content')


    <main>
        <div class="container">
            <div class="jumbotron">
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">রেজিস্ট্রেশন ফর্ম পূরণ করার জন্য আপনার যে সমস্ত তথ্য প্রয়োজন পড়বে:</span></strong></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">ক). জাতীয় পরিচয়পত্র নং </span></strong></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">খ). মোবাইল ও ভ্যালিড ইমেইল আইডি </span></strong></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><strong><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">গ). পোস্ট কোড এবং ব্যাক্তিগত ও চাকুরী সংক্রান্ত অন্যান্য তথ্যাবলী।</span></strong></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">&nbsp;</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;"><strong style="font-family: Calibri, sans-serif; font-size: 14.6667px;"><u><span lang="BN" style="font-size: 15pt; line-height: 21.4px; font-family: Nikosh; color: red;">রেজিষ্ট্রেশনের নিয়মাবলী:</span></u>
                </strong>
                </span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">১.&nbsp;</span><span style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;"><a style="color: #1155cc;" href="http://www.nata.gov.bd/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://www.nata.gov.bd&amp;source=gmail&amp;ust=1584954661041000&amp;usg=AFQjCNH_39jSecJ93M_N6BVnnsQlNY1duA">www.nata.gov.bd</a>&nbsp;<span lang="BN">ওয়েবসাইটে দেয় ব্লিংককৃত &lsquo;<span style="color: red;">অনলাইন ট্রেনিং রেজিস্ট্রেশন</span>&rsquo;
                এ ক্লিক করুন অথবা সরাসরি&nbsp;</span><a style="color: #1155cc;" href="http://tmis.nata.gov.bd/" target="_blank" rel="noopener" data-saferedirecturl="https://www.google.com/url?q=http://tmis.nata.gov.bd&amp;source=gmail&amp;ust=1584954661041000&amp;usg=AFQjCNE_iaNdTdsL6Thx6EB0ULn_pOgonw">tmis.nata.gov.bd</a>&nbsp;
                <span
                    lang="BN">এ ভিজিট করুন।</span>
                    </span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">২. নতুন প্রশিক্ষণার্থীদের ক্ষেত্রে &lsquo;রেজিস্ট্রেশনে&rsquo; ট্যাবে ক্লিক করুন, পূর্বে রেজিস্ট্রেশনকৃত প্রশিক্ষণার্থীবৃন্দ &lsquo;লগ ইন&rsquo; ট্যাবে ক্লিক করুন।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৩. নতুন প্রশিক্ষণার্থীদের ক্ষেত্রে&nbsp;</span><span style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">Registration (First Step)<span lang="BN">&nbsp;এর নীচে একাউন্ট টাইপ বা রোল এ আপনার টাইপ &lsquo;</span>Participant
                <span
                    lang="BN">&rsquo; নির্বাচন করুন এবং &lsquo;</span>Next Step<span lang="BN">&rsquo; এ ক্লিক&nbsp; &nbsp; করুন।</span></span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৪. সঠিকভাবে প্রয়োজনীয় তথ্য দিয়ে ফর্মটি পূরণ করুন।&nbsp;<span style="color: #c55a11;">সার্ভিস আইডি এর ক্ষেত্রে কোন আইডি না থাকলে&nbsp;</span></span>
                    <span
                        style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh; color: #c55a11;">N/A&nbsp;<span lang="BN">লিখতে হবে।</span></span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৪. সকল তথ্য দেবার পরে আপনার ইচ্ছামতো তবে সর্বনিম্ন আট ডিজিটের পাসওয়ার্ড সেট করুন এবং সাবমিট করুন। এটি আপনার ইমেইলের কোন পাসওয়ার্ড নয়, আপনার ইচ্ছামতো আট ডিজিটের হতে পারে। এবং পরবর্তী সময়ে নাটাতে অন্য কোন প্রশিক্ষণে আসলে এই পাসওয়ার্ড প্রয়োজন পড়বে। কোন কারণে পাসওয়ার্ড ভুলে গেলে &lsquo;</span>
                    <span
                        style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">Forget your password<span lang="BN">&rsquo; এ ক্লিক করে সেটা পুনরুদ্ধার করতে পারবেন।</span></span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৫. ছবি থাকলে আপলোড করুন (আবশ্যক নয়) এবং অত:পর যে কোর্সের জন্য প্রশিক্ষণে মনোনীত হয়েছেন, সেটি নির্বাচন করুন।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৬. রেজিস্ট্রেশন সম্পন্ন করার পরে যদি কোন তথ্য পরিবর্তন করার প্রয়োজন হয়, তবে এডিট প্রোফাইলে গিয়ে তথ্য পরিবর্তন করতে পারবেন।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৭. যারা পূর্বে আমাদের এই নতুন সিস্টেমে রেজিস্ট্রেশন করেছেন, তারা সরাসরি &lsquo;</span><span style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">Log in<span lang="BN">&rsquo; এ ক্লিক করুন এবং যে কোর্সের জন্য মনোনীত হয়েছেন, সেটা নির্বাচন করুন।</span></span>
                </p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৮. উল্লেখ থাকে যে, একই প্রশিক্ষণার্থী একই বিষয়ের প্রশিক্ষণ কোর্সে দুই বছরের মাঝে পুনরায় রেজিস্ট্রেশন করতে পারবেন না।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৯. সফলভাবে রেজিস্ট্রেশন সম্পন্ন করার পরে, আপনার বরাদ্দকৃত রুম নং সহ একটি ম্যাসেজ আপনার ইমেইলে যাবে।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">৯. সকল তথ্য সঠিকভাবে পূরণ করুন, এই তথ্যাবলী ব্যাবহার করে আপনার সনদপত্র এবং রিলিজ লেটার ইস্যু করা হবে।</span></p>
                <p class="MsoNormal" style="margin: 0in 0in 8pt; color: #222222; text-align: justify; line-height: 15.6933px; font-size: 11pt; font-family: Calibri, sans-serif;"><span lang="BN" style="font-size: 14pt; line-height: 19.9733px; font-family: Nikosh;">&nbsp; নাটার প্রশিক্ষণে অনলাইনে রেজিস্ট্রেশন করার জন্য অনেক ধন্যবাদ।</span></p>
            </div>
            <div class="jumbotron">
                <h2 class="text-center">Registration (First Step)</h2>
                <form action="#" class="form" method="get">

                    <div class="row">
                        <fieldset class="the-fieldset" style="margin-top: 0px;margin-right: 15px;margin-left: 15px;">


                            <div class="form-group">

                                <div class="col-12 text-center"><br>

                                    <a href="{{ route('apply.form') }}" class="btn btn-success" >
                                        <strong>
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbspNext Step&nbsp&nbsp
                                            <i class="fas fa-arrow-right"></i>
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </strong>
                                    </a>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </main>








@endsection
