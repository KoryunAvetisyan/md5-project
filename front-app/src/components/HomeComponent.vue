<template>
    <div>
        <p class="h3 text-center" v-if="!isLoggedIn">Այս կայքում դուք կարող եք ծանոթանալ MD5 գաղտնագրման ալգորիթմի հետ։</p>
        <p class="h3 text-center" v-if="isLoggedIn">Բարի գալուստ {{ userInfo.email }}</p>
        <div class="mt-5" v-if="isLoggedIn">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            MD5 գաղտնագրման ալգորիթմ
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>MD5 գաղտնագրությունը հաճախ օգտագործվող, մասնակի անապահով, 128 բիթ երկարությամբ հեշ արժեք ունեցող հեշ ֆունկցիա է։ Որպես ինտերնետ ստանդարտ RFC 1321-ի մաս, այն օգտագործվում է բազմազան սպահովագրման գործողություններում և ֆայլերի ամբողջականությունը ստուգելու համար։ MD5 հեշը հաճախ ներկայացվում է որպես 32 նիշանոց տասվեցական թիվ։ MD5-ը նախագծվել է Ռոն Ռիվեստի կողմից 1991 թ.-ին իր նախորդող MD4-ին փոխարինելու համար։ 1996 թ.-ին հայտնաբերվել է առաջին թերությունը։ Չնայած որ թերությունը ճակատագրական չէր, գաղտնագրողները սկսեցին խորհուրդ տալ օգտագործել այն հեշ ֆունկցիաներ, օրինակ SHA-1(չնայած վերջինս նույնպես ունի բազում խոցելիություններ)։ 2004 թ.-ին ավելի վտանգավոր խոցելիություններ հայտնաբերվեցին, որոնք MD5-ի օգտագործումը հարցականի տակ էին դնում։ Իսկ 2006 թ.-ին մի խումբ հետազոտողներ նկարագրեցին մի ալգորիթմ, որը թույլ էր տալիս ստեղծել 2 ֆայլ նույն MD5 checksum-ով։</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Պատմություն
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Message Digset-ն ալգորիթմների խումբ է, որոնք նկարագրվել են պրոֆեսոր Ռոնալդ Ռիվեստի կողմից։ MD5-ը ստեղծվեց որպես MD4-ի փոխարինող, երբ դեռ վերջինիս խոցելիությունները հայտնի չէին, սակայն նրանք շուտով երևան եկան։ 1993 թ.-ին հայտնաբերվեցին MD5-ի թերություններ ունենալու առաջին պսեվդո-նշանները։ Դեն Բոեռը ներկայացրեց 2 սկզբնարժքեավորման վեկտորներ որոնք տալիս էին նույն հեշ արդյունքը։ 1996 թ.-ին Դոբերտինը հայտարարեց MD5-ի համեմատման ֆունկցիայի ընդհարման մասին։ Սա ամբողջական հարձակում չէր MD5-ի վրա, բայց սա բերեց այլ հեշ ֆունկցիաների օգտագործմանը անցնելու մասին մեծ խոսակցությունների։</p>
                            <p>128 բիթը բավականին փոքր է ծննդյան հարձակում (birthday attack) գործելու համար։ 2004ին թողարկվեց MD5CRK կոչված մի նախագիծ որը նպատակ էր դրել ապացուցել MD5ում ընդհարումների գոյությունը, սակայն այն ավարտվեց այն բանից հետո, երբ 2004-ի օգոստոսի 17ին Ժիայոյուն Վանգը հայտարարեց MD5ում գոյություն ունեցող լրիվ ընդհարումների մասին։ Նրանց անալիտիկ հարձակումը տևում էր 1 ժամ IBM p690 cluster-ի վրա։</p>
                            <p>2005 թ.-ի մարտի 1-ին Արյեն Լեսնտրան Ժիայոյուն Վանգի հետ միասին ցուցադրեցին 2 X.509 սերտիֆիկատներ տարբեր հասարակական բանալիներով (public key) և նույն MD5 հեշ կոդով, ինչով ապացուցեցին ընդհարումների հնարավորությունը պրակտիկայում։ Մի քանի օր անց Վլաստիմիլ Կլիման ներկայացրեց ալգորիթմ որը իվիճակի էր կառուցել MD5 ընդհարում մի քանի ժամերի ընթացքում, 1 ծնկադիր համակարգչի վրա։ 2006 թ.-ի մարտի 18-ին նույն Կլիման ներկայացրեց նոր ալգորիթմ, որը նա անվանեց թունելավորման ալգորիթմ։ Վերջինս գտնում էր ընդհարում 1 նոթբուքի վրա, ընդամենը 1 ժամում։</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Կիրառությունները
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>MD5-ը լայն կիրառություն է գտել կիրառական ծրագրերի լայն բնագավառում, որտեղ պետք է տալ որոշակի երաշխիք որ փոխադրված տվյալները բարեհաջող տեղ են հասել։ Օրինակ շատ սերվերներ տրամադրում են նախօրոք հաշվարկված MD5 checksum-ներ, որպեսզի օգտագործողը կարողանա ֆայլը ստանալուց հետո հաշվարկել ստացված ֆայլի MD5 checksum-ը և համեմատի ստացվածի հետ։ Սակայն հաշվի առնելով, որ այժմ շատ հեշտ է ստանալ MD5 ընդհարում՝ 2 ֆայլ նույն MD5 հեշ արժեքով, չի կարելի վստահել ֆայլերի ամբողջականությունը ստուգելու այս եղանակին։</p>
                            <p>UNIX-անման օպերացիոն համակարգերը ներառում են MD5-ի հաշվարկման ծրագրեր իրենց ստանդարտ փաթեթում, մինչդեռ Windows համակարգում օգտագործվում են երրորդ կողմերի ծրագրերը։</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Ալգորիթմ
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>MD5-ը վերածում է փոփոխական երկարության հաղորդագրությունը 128 բիթանոց ելքային տողի։ Ներմուծված տողը մասնատվում է 512-բիթանոց բլոկերի՝ 16 հատ 32-բիթանոց ամբողջ թվերի։ Հաղորդագրության երկարությունը ավելացվում է այնպես, որ այն բաժանելի լինի 512ի։ Ավելացումը իրականացվում է հետևյալ կերպ՝ սկզբից 1 բիթ՝ 1 է ավելացվում հաղորդագրությանը, ինչից հետո հաջորդում են այնքան 0-ներ, որ հաղորդագրության երկարությանը պակասի 64 բիթ 512-ի բաժանելի լինելու համար։ Վերջին 64 բիթերը լրացվում են հաղորդագրության իրական երկարությունը բիթերով ներկայացնող ամբողջ թվով։</p>
                            <p>Հիմնական MD5 ալգորիթմը աշխատում է 128 բիթանոց վիճակներով, բաժանված 4 հատ 32 բիթանոց բառերի, որոնք համապատասխանաբար կկոչվեն A, B, С և D։ Վերջիններս սկզբնարժեքավորվում են հայտնի հաստատուններով։ MD5 ալգորիթմը հաջորդաբար գործողություններ է կատարոմ ամեն բլոկի հետ, ինչի արդյունքում փոփորվում են վիճակի փոփոխականները։ Հաղորդագրության բլոկի մշակումը բաղկացած է 4 համանման փուլերից, որոնք անվանվում են շրջաններ՝ rounds։ Ամեն շրջանը բաղկացած է 16 ոչ գծային ֆունկցիաների (մոդուլ 2-ով գումարում, ձախ պտույտ) վրա հիմնված օպերացիաներից։ Կան հնարավոր 4 ֆունկցիաներ, որոնցից ամեն շրջանում օգտագործվում է մեկը։</p>
                            <img src="../assets/image1.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div style="display: flex; justify-content: center; flex-direction: column;">
            <input type="text" class="form-control shadow-none" :value="message" @input="handleHashing($event.target.value)">
            <p style="margin-top: 10px; text-align: center;">MD5 hash - {{ hashedMessage }}</p>
        </div>
    </div>
</template>
  
<script>
import * as md5 from 'blueimp-md5'
export default {
    name: 'HomeComponent',

    data () {
        return {
            isLoggedIn: !!(localStorage.getItem('haveUser')),
            userInfo: JSON.parse(localStorage.getItem('haveUser')) || null,
            message: '',
            hashedMessage: ''
        }
    },
    methods: {
        handleHashing (data) {
            this.message = data
            this.hashedMessage = md5 (data)
            if (!this.message) {
                this.hashedMessage = ''
            }
        }
    },
    mounted () {
        if (this.$route.params.fromAnotherComponent === 'yes') {
            window.location.reload()
        }
    }
}
</script>

<style scoped>
button:focus {
    box-shadow: none;
} 
</style>