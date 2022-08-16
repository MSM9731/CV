window.addEventListener('load', function() {
  const goUp = document.getElementById('goUp').getElementsByTagName('button')[0],
  myLocationElement = document.getElementById('myLocation')
  // myLocation = myLocationElement.innerHTML;



  goUp.addEventListener("click",
    function (e) {
      window.scrollTo(0, 0);
    });


  window.addEventListener("scroll", function (e) {
    goUp.style.transform = this.scrollY < this.innerHeight ? 'scale(0)': 'scale(1)';
    if (this.scrollY > document.getElementsByTagName('footer')[0].offsetTop - window.innerHeight) {
      goUp.classList.remove('btn-dark', 'opacity-50')
      goUp.classList.add('btn-danger')
    } else {
      goUp.classList.remove('btn-danger')
      goUp.classList.add('btn-dark', 'opacity-50')
    }
  });



  const aboutMe = new Vue({
    el: '#aboutMe',
    data: {
      aboutMe: {
        text: 'یک عدد برنامه نویس وب! و البته عاشق برنامه نویسی! همیشه درحال یادگیری و مشتاق رسیدن به اون بالابالاها'
      },
      myPicture: {
        src: 'assets/img/mypic.jpg'
      },
      personalInfo: {
        list: [{
          title: 'آدرس',
          content: 'تهران، شهریار'
        },{
          title: 'وضعیت سربازی',
          content: 'مشمول'
        },{
          title: 'وضعیت تاهل',
          content: 'مجرد'
        },{
          title: 'تاریخ تولد',
          content: '۱۳۷۹'
        }]
      },
      contactInfo: {
        list: [{
          title: 'تلفن همراه',
          content: '+98 - 9195600184',
          linkText: 'تماس',
          linkHref: 'tel:+989195600184'
        },{
          title: 'ایمیل',
          content: 'salehmohammadi@chmail.ir',
          linkText: 'ایمیل',
          linkHref: 'mailto:salehmohammadi@chmail.ir'
        },{
          title: 'واتساپ',
          content: '09195600184',
          linkText: 'پیام',
          linkHref: 'https://wa.me/989195600184'
        }]
      },
      skills: {
        list: [{
          title: 'HTML5',
          percent: 100
        },{
          title: 'CSS3',
          percent: 100
        },{
          title: 'Javascript',
          percent: 95
        },{
          title: 'Bootstrap',
          percent: 90
        },{
          title: 'JQuery',
          percent: 95
        },{
          title: 'SASS',
          percent: '80'
        },{
          title: 'SCSS',
          percent: '80'
        },{
          title: 'LESS',
          percent: '80'
        },{
          title: 'Ajax',
          percent: 95
        },{
          title: 'Web Worker',
          percent: 95
        },{
          title: 'Vue',
          percent: 50
        },{
          title: 'PHP',
          percent: 75
        },{
          title: 'Mysql',
          percent: 50
        },{
          title: 'UX',
          percent: 80
        },{
          title: 'Microsoft Word',
          percent: 95
        },{
          title: 'Microsoft Powerpoint',
          percent: 95
        },{
          title: 'Microsoft Exel',
          percent: 30
        }]
      },
      educationCourses: {
        list: [{
          title: 'Javascript',
          type: 'ویدئوی آموزشی'
        },{
          title: 'Bootstrap',
          type: 'ویدئوی آموزشی'
        },{
          title: 'JQuery',
          type: 'ویدئوی آموزشی'
        },{
          title: 'Vue.js',
          type: 'ویدئوی آموزشی'
        },{
          title: 'PHP',
          type: 'ویدئوی آموزشی'
        }]
      },
      degrees_certificates_honors: {
        list: [{
          title: 'دوره مقدماتی تا پیشرفته جاوااسکریپت',
          file_link: ''
        },{
          title: 'نکات حرفه ای جاوااسکریپت',
          file_link: ''
        },{
          title: 'Bootstrap',
          file_link: ''
        },{
          title: 'Sass',
          file_link: ''
        },{
          title: 'Clean Code',
          file_link: ''
        },{
          title: 'تکنیک های مقدماتی سئو',
          file_link: ''
        }]
      },
      workExperiences: {
        list: [{
          title: 'فریلنسری',
          company: '',
          startDate: 'اردیبهشت ۱۴۰۰',
          endDate: 'تیر 1400',
          duty: ''
        },{
          title: 'برنامه نویس فرانت اند',
          company: 'هوشمند پردازش فراز پارسه',
          startDate: 'تیر 1400',
          endDate: 'کنون',
          duty: ''
        }]
      },
      characterRecegnitionTests: {
        list: [{
          title: 'MBTI',
          link: 'http://tlnl.ink/5T427'
        },{
          title: 'Bar-On',
          link: 'http://tlnl.ink/9TA33'
        },{
          title: 'Raven',
          link: 'http://tlnl.ink/TNXS0'
        }]
      },
      hobbiesAndInterests: {
        list: [{
          title: 'برنامه نویسی'
        },{
          title: 'موسیقی'
        },{
          title: 'فیلم'
        }]
      },
      educationalBackground: {
        list: [{
          title: 'لیسانس',
          university: 'دانشگاه صنعتی اصفهان',
          startDate: '۱۳۹۸',
          endDate: 'کنون'
        }]
      }
    }
  }),
  servises = new Vue({
    el: '#services',
    data: {
      list: [{
        title: 'طراحی واکنش گرا',
        content: 'طراحی متناسب با تمام دستگاه ها',
        imageSrc: 'assets/img/responsive-design.jpg'
      },{
        title: 'توسعه وب',
        content: 'توسعه و ارتقاء صفحات، رابط کاربری و منطق سایت',
        imageSrc: 'assets/img/develope-website.jpg'
      },{
        title: 'پشتیبانی',
        content: 'پشتیبانی از سایت',
        imageSrc: 'assets/img/website-support.jpg'
      }]
    }
  }),
  contactMe = new Vue({
    el: '#contactMe',
    data: {
      mapSrc: 'https://maps.google.com/maps?width=0&amp;height=0&amp;hl=fa&amp;title=fa&amp;q=%D8%B4%D9%87%D8%B1%DA%A9%20%D8%B4%D9%87%DB%8C%D8%AF%20%D9%85%D8%B7%D9%87%D8%B1%DB%8C%20%D8%A8%D8%A7%D8%BA%D8%B3%D8%AA%D8%A7%D9%86+(hhhhhhh)&amp;ie=UTF8&amp;t=r&amp;z=10&amp;iwloc=B&amp;output=embed'
    }
  });







//   console.log('all loaded');
});








// document.getElementsByClassName('navbar-toggler')[0]
// .addEventListener('click', function(e) {
// !document.fullscreenElement ?
//   document.documentElement.requestFullscreen() :
//   document.exitFullscreen();
// })
