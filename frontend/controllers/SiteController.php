<?php

namespace frontend\controllers;

use common\models\DistrictView;
use common\models\Soato;
use common\models\Stat;
use common\models\Stat2;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use yii\helpers\Html;
use yii\httpclient\Client;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function getDiff($new, $old)
    {
        $diff = $new - $old;
        if ($diff == 0) {
            return $new;
        }
        if ($diff > 0) {
            $diff = "+$diff";
        }
        return "$new ($diff)";
    }


    public function getStatSum($code)
    {
        $cnt = Stat::find()->where(['code' => $code])->sum('value');
        $cnt_old = Stat2::find()->where(['code' => $code])->sum('value');
        return $this->getDiff($cnt, $cnt_old);
    }

    public function getCard1()
    {
        $cnt0 = Stat::find()->count('distinct soato_id');
        $cnt0_old = Stat2::find()->count('distinct soato_id');
        $val0 = $this->getDiff($cnt0, $cnt0_old);

        $cnt1 = Stat::find()->where(['code' => 1031, 'value' => 1])->count();
        $cnt1_old = Stat2::find()->where(['code' => 1031, 'value' => 1])->count();
        $val1 = $this->getDiff($cnt1, $cnt1_old);

        $cnt2 = Stat::find()->where(['code' => 1031, 'value' => 2])->count();
        $cnt2_old = Stat2::find()->where(['code' => 1031, 'value' => 2])->count();
        $val2 = $this->getDiff($cnt2, $cnt2_old);

        $cnt3 = Stat::find()->where(['code' => 1031, 'value' => 3])->count();
        $cnt3_old = Stat2::find()->where(['code' => 1031, 'value' => 3])->count();
        $val3 = $this->getDiff($cnt3, $cnt3_old);

        $cnt4 = Stat::find()->where(['code' => 1016])->andWhere(['not', ['value' => '']])->count();
        $cnt4_old = Stat2::find()->where(['code' => 1016])->andWhere(['not', ['value' => '']])->count();
        $val4 = $this->getDiff($cnt4, $cnt4_old);

        $cnt5 = Stat::find()->where(['code' => 1018])->sum('value');
        $cnt5_old = Stat2::find()->where(['code' => 1018])->sum('value');
        $val5 = $this->getDiff($cnt5, $cnt5_old);

        $cnt6 = Stat::find()->where(['code' => 1018110])->sum('value');
        $cnt6_old = Stat2::find()->where(['code' => 1018110])->sum('value');
        $val6 = $this->getDiff($cnt6, $cnt6_old);

        $cnt7 = Stat::find()->where(['code' => 1018112])->sum('value');
        $cnt7_old = Stat2::find()->where(['code' => 1018112])->sum('value');
        $val7 = $this->getDiff($cnt7, $cnt7_old);

        $cnt8 = Stat::find()->where(['code' => 1019])->sum('value');
        $cnt8_old = Stat2::find()->where(['code' => 1019])->sum('value');
        $val8 = $this->getDiff($cnt8, $cnt8_old);

        $cnt9 = Stat::find()->where(['code' => 1021])->sum('value');
        $cnt9_old = Stat2::find()->where(['code' => 1021])->sum('value');
        $val9 = $this->getDiff($cnt9, $cnt9_old);

        $cnt10 = Stat::find()->where(['code' => 1022])->sum('value');
        $cnt10_old = Stat2::find()->where(['code' => 1022])->sum('value');
        $val10 = $this->getDiff($cnt10, $cnt10_old);

        $cnt11 = Stat::find()->where(['code' => 1023])->sum('value');
        $cnt11_old = Stat2::find()->where(['code' => 1023])->sum('value');
        $val11 = $this->getDiff($cnt11, $cnt11_old);

        $cnt12 = Stat::find()->where(['code' => 1025])->sum('value');
        $cnt12_old = Stat2::find()->where(['code' => 1025])->sum('value');
        $val12 = $this->getDiff($cnt12, $cnt12_old);

        $cnt13 = Stat::find()->where(['code' => 1026])->sum('value');
        $cnt13_old = Stat2::find()->where(['code' => 1026])->sum('value');
        $val13 = $this->getDiff($cnt13, $cnt13_old);

        $cnt14 = Stat::find()->where(['code' => 1027])->sum('value');
        $cnt14_old = Stat2::find()->where(['code' => 1027])->sum('value');
        $val14 = $this->getDiff($cnt14, $cnt14_old);

        $cnt15 = Stat::find()->where(['code' => 1028])->sum('value');
        $cnt15_old = Stat2::find()->where(['code' => 1028])->sum('value');
        $val15 = $this->getDiff($cnt15, $cnt15_old);

        $cnt16 = Stat::find()->where(['code' => 1029])->sum('value');
        $cnt16_old = Stat2::find()->where(['code' => 1029])->sum('value');
        $val16 = $this->getDiff($cnt16, $cnt16_old);

        $cnt17 = Stat::find()->where(['code' => 1033, 'value' => 1])->count();
        $cnt17_old = Stat2::find()->where(['code' => 1033, 'value' => 1])->count();
        $val17 = $this->getDiff($cnt17, $cnt17_old);

        $cnt18 = Stat::find()->where(['code' => 1033, 'value' => 0])->count();
        $cnt18_old = Stat2::find()->where(['code' => 1033, 'value' => 0])->count();
        $val18 = $this->getDiff($cnt18, $cnt18_old);

        $cnt19 = Stat::find()->where(['code' => 1035, 'value' => 1])->count();
        $cnt19_old = Stat2::find()->where(['code' => 1035, 'value' => 1])->count();
        $val19 = $this->getDiff($cnt19, $cnt19_old);

        $cnt20 = Stat::find()->where(['code' => 1035, 'value' => 0])->count();
        $cnt20_old = Stat2::find()->where(['code' => 1035, 'value' => 0])->count();
        $val20 = $this->getDiff($cnt20, $cnt20_old);

        return [
            'Жами маҳаллалар' => $val0,
            'Қизил худудлар' => $val1,
            'Сариқ худудлар' => $val2,
            'Яшил худудлар' => $val3,
            'Қўшни давлатлар билан чегарадошлар' => $val4,
            'Таркибидаги кўчалар сони' => $val5,
            'Тупроқ йўлли кўчалар сони' => $val6,
            'Таъмирталаб йўлли кўчалар сони' => $val7,
            'Таркибидаги кўп қаватли уйлар сони' => $val8,
            'Якка тартибдаги ҳовлилар сони' => $val9,
            'Таркибидаги аҳоли доимий яшамайдиган: хонадонлар (квартиралар) сони' => $val10,
            'Хўжаликлар сони' => $val11,
            'Хонадонлар сони' => $val12,
            'Оилалар сони' => $val13,
            'Ёшлар дафтарига киритлган сони' => $val14,
            'Темир дафтарга киритилган сони' => $val15,
            'Аёллар дафтарига киритлган сони' => $val16,
            'Газлашган' => $val17,
            'Газлашганмаган' => $val18,
            'Ичимлик суви билан таъминланган' => $val19,
            'Ичимлик суви билан таъминланмаган' => $val20,
        ];
    }

    public function getCard2()
    {
        $cnt1 = Stat::find()->where(['code' => 1410])->sum('value');
        $cnt1_old = Stat2::find()->where(['code' => 1410])->sum('value');
        $val1 = $this->getDiff($cnt1, $cnt1_old);

        $cnt2 = Stat::find()->where(['code' => 1410100])->sum('value');
        $cnt2_old = Stat2::find()->where(['code' => 1410100])->sum('value');
        $val2 = $this->getDiff($cnt2, $cnt2_old);

        $cnt3 = Stat::find()->where(['code' => 1410101])->sum('value');
        $cnt3_old = Stat2::find()->where(['code' => 1410101])->sum('value');
        $val3 = $this->getDiff($cnt3, $cnt3_old);

        $cnt4 = Stat::find()->where(['code' => 1410200])->sum('value');
        $cnt4_old = Stat2::find()->where(['code' => 1410200])->sum('value');
        $val4 = $this->getDiff($cnt4, $cnt4_old);

        $cnt5 = Stat::find()->where(['code' => 1410201])->sum('value');
        $cnt5_old = Stat2::find()->where(['code' => 1410201])->sum('value');
        $val5 = $this->getDiff($cnt5, $cnt5_old);

        $cnt6 = Stat::find()->where(['code' => 1410202])->sum('value');
        $cnt6_old = Stat2::find()->where(['code' => 1410202])->sum('value');
        $val6 = $this->getDiff($cnt6, $cnt6_old);


        $cnt7 = Stat::find()->where(['code' => 1410203])->sum('value');
        $cnt7_old = Stat2::find()->where(['code' => 1410203])->sum('value');
        $val7 = $this->getDiff($cnt7, $cnt7_old);

        $cnt8 = Stat::find()->where(['code' => 1410204])->sum('value');
        $cnt8_old = Stat2::find()->where(['code' => 1410204])->sum('value');
        $val8 = $this->getDiff($cnt8, $cnt8_old);

        $cnt9 = Stat::find()->where(['code' => 1410205])->sum('value');
        $cnt9_old = Stat2::find()->where(['code' => 1410205])->sum('value');
        $val9 = $this->getDiff($cnt9, $cnt9_old);

        $cnt10 = Stat::find()->where(['code' => 1410206])->sum('value');
        $cnt10_old = Stat2::find()->where(['code' => 1410206])->sum('value');
        $val10 = $this->getDiff($cnt10, $cnt10_old);

        $cnt11 = Stat::find()->where(['code' => 1411])->sum('value');
        $cnt11_old = Stat2::find()->where(['code' => 1411])->sum('value');
        $val11 = $this->getDiff($cnt11, $cnt11_old);

        $cnt12 = Stat::find()->where(['code' => 1411100])->sum('value');
        $cnt12_old = Stat2::find()->where(['code' => 1411100])->sum('value');
        $val12 = $this->getDiff($cnt12, $cnt12_old);

        $cnt13 = Stat::find()->where(['code' => 1411101])->sum('value');
        $cnt13_old = Stat2::find()->where(['code' => 1411101])->sum('value');
        $val13 = $this->getDiff($cnt13, $cnt13_old);

        $cnt14 = Stat::find()->where(['code' => 1411102])->sum('value');
        $cnt14_old = Stat2::find()->where(['code' => 1411102])->sum('value');
        $val14 = $this->getDiff($cnt14, $cnt14_old);

        $cnt15 = Stat::find()->where(['code' => 1411103])->sum('value');
        $cnt15_old = Stat2::find()->where(['code' => 1411103])->sum('value');
        $val15 = $this->getDiff($cnt15, $cnt15_old);

        $cnt16 = Stat::find()->where(['code' => 1411104])->sum('value');
        $cnt16_old = Stat2::find()->where(['code' => 1411104])->sum('value');
        $val16 = $this->getDiff($cnt16, $cnt16_old);

        $cnt17 = Stat::find()->where(['code' => 1411105])->sum('value');
        $cnt17_old = Stat2::find()->where(['code' => 1411105])->sum('value');
        $val17 = $this->getDiff($cnt17, $cnt17_old);

        $cnt18 = Stat::find()->where(['code' => 1412])->sum('value');
        $cnt18_old = Stat2::find()->where(['code' => 1412])->sum('value');
        $val18 = $this->getDiff($cnt18, $cnt18_old);

        $cnt19 = Stat::find()->where(['code' => 1413])->sum('value');
        $cnt19_old = Stat2::find()->where(['code' => 1413])->sum('value');
        $val19 = $this->getDiff($cnt19, $cnt19_old);

        $cnt20 = Stat::find()->where(['code' => 1414])->sum('value');
        $cnt20_old = Stat2::find()->where(['code' => 1414])->sum('value');
        $val20 = $this->getDiff($cnt20, $cnt20_old);

        $cnt21 = Stat::find()->where(['code' => 1415])->sum('value');
        $cnt21_old = Stat2::find()->where(['code' => 1415])->sum('value');
        $val21 = $this->getDiff($cnt21, $cnt21_old);

        $cnt22 = Stat::find()->where(['code' => 1416])->sum('value');
        $cnt22_old = Stat2::find()->where(['code' => 1416])->sum('value');
        $val22 = $this->getDiff($cnt22, $cnt22_old);

        $cnt23 = Stat::find()->where(['code' => 1417])->sum('value');
        $cnt23_old = Stat2::find()->where(['code' => 1417])->sum('value');
        $val23 = $this->getDiff($cnt23, $cnt23_old);

        $cnt24 = Stat::find()->where(['code' => 1418])->sum('value');
        $cnt24_old = Stat2::find()->where(['code' => 1418])->sum('value');
        $val24 = $this->getDiff($cnt24, $cnt24_old);

        $cnt25 = Stat::find()->where(['code' => 1419])->sum('value');
        $cnt25_old = Stat2::find()->where(['code' => 1419])->sum('value');
        $val25 = $this->getDiff($cnt25, $cnt25_old);

        $cnt26 = Stat::find()->where(['code' => 1420])->sum('value');
        $cnt26_old = Stat2::find()->where(['code' => 1420])->sum('value');
        $val26 = $this->getDiff($cnt26, $cnt26_old);

        $cnt27 = Stat::find()->where(['code' => 1421])->sum('value');
        $cnt27_old = Stat2::find()->where(['code' => 1421])->sum('value');
        $val27 = $this->getDiff($cnt27, $cnt27_old);

        $cnt28 = Stat::find()->where(['code' => 1422])->sum('value');
        $cnt28_old = Stat2::find()->where(['code' => 1422])->sum('value');
        $val28 = $this->getDiff($cnt28, $cnt28_old);

        $cnt29 = Stat::find()->where(['code' => 1423])->sum('value');
        $cnt29_old = Stat2::find()->where(['code' => 1423])->sum('value');
        $val29 = $this->getDiff($cnt29, $cnt29_old);

        $cnt30 = Stat::find()->where(['code' => 1424])->sum('value');
        $cnt30_old = Stat2::find()->where(['code' => 1424])->sum('value');
        $val30 = $this->getDiff($cnt30, $cnt30_old);

        $cnt31 = Stat::find()->where(['code' => 1425])->sum('value');
        $cnt31_old = Stat2::find()->where(['code' => 1425])->sum('value');
        $val31 = $this->getDiff($cnt31, $cnt31_old);

        $cnt32 = Stat::find()->where(['code' => 1426])->sum('value');
        $cnt32_old = Stat2::find()->where(['code' => 1426])->sum('value');
        $val32 = $this->getDiff($cnt32, $cnt32_old);

        return [
            [['Аҳоли сони', $val1], ['Фуқаролар йиғинида рўйхатдан ўтмасдан яшаётганлар', $val23]],
            [['Аҳоли сони эркаклар', $val2], ['Ижара шартномаси асосида яшаётганлар сони', $val24]],
            [['Аҳоли сони аёлар', $val3], ['Меҳнатга лаёқатли аҳоли сони (16-54 ёшли аёллар, 16-59 ёшли эркаклар)', $val25]],
            [['ўзбеклар сони', $val4], ['Туғилганлар сони', $val26]],
            [['қорақалпоқлар', $val5], ['Тузилган никоҳлар сони, бирлик', $val27]],
            [['руслар', $val6], ['Вафот этганлар сони', $val28]],
            [['тожиклар', $val7], ['Никоҳдан ажрашганлар сони, бирлик', $val29]],
            [['татарлар', $val8], ['Ёшлар ўртасида никоҳдан ажрашганлар сони, бирлик', $val30]],
            [['туркманлар', $val9], ['Доимий яшаш мақсадида кўчиб келганлар сони', $val31]],
            [['бошқа миллатлар', $val10], ['Доимий яшаш мақсадида кўчиб кетганлар сони', $val32]],
            [['Жами 0-30 ёшлилар', $val11], ['', '']],
            [['Жами 0-30 ёшли аёллар', $val12], ['', '']],
            [['- 0 - 2 ёш', $val13], ['', '']],
            [['- 3 - 6 ёш', $val14], ['', '']],
            [['- 7-13 ёш', $val15], ['', '']],
            [['-  14-17 ёш', $val16], ['', '']],
            [['- 18-30 ёш', $val17], ['', '']],
            [['100 ёшдан катталар', $val18], ['', '']],
            [['Меҳнатга лаёқатли ёшдан юқори аҳоли сони (55 ёшдан катта аёллар ва 60 ёшдан катта эркаклар)', $val19], ['', '']],
            [['Фуқаролиги бўлмаган шахслар сони', $val20], ['', '']],
            [['Фуқаролар йиғинида рўйхатда туриб, ҳозирги кунда яшамаётганлар сони', $val21], ['', '']],
            [['Вақтинча рўйхатдан ўтиб яшаётганлар сони', $val22], ['', '']],
        ];
    }

    public function getCard3()
    {
        $cnt1 = Stat::find()->where(['code' => 1610])->sum('value');
        $cnt1_old = Stat2::find()->where(['code' => 1610])->sum('value');
        $val1 = $this->getDiff($cnt1, $cnt1_old);

        $cnt2 = Stat::find()->where(['code' => 1611])->sum('value');
        $cnt2_old = Stat2::find()->where(['code' => 1611])->sum('value');
        $val2 = $this->getDiff($cnt2, $cnt2_old);

        $cnt3 = Stat::find()->where(['code' => 1612])->sum('value');
        $cnt3_old = Stat2::find()->where(['code' => 1612])->sum('value');
        $val3 = $this->getDiff($cnt3, $cnt3_old);

        $cnt4 = Stat::find()->where(['code' => 1613])->sum('value');
        $cnt4_old = Stat2::find()->where(['code' => 1613])->sum('value');
        $val4 = $this->getDiff($cnt4, $cnt4_old);

        $cnt5 = Stat::find()->where(['code' => 1614])->sum('value');
        $cnt5_old = Stat2::find()->where(['code' => 1614])->sum('value');
        $val5 = $this->getDiff($cnt5, $cnt5_old);

        $cnt6 = Stat::find()->where(['code' => 1615])->sum('value');
        $cnt6_old = Stat2::find()->where(['code' => 1615])->sum('value');
        $val6 = $this->getDiff($cnt6, $cnt6_old);

        $cnt7 = Stat::find()->where(['code' => 1616])->sum('value');
        $cnt7_old = Stat2::find()->where(['code' => 1616])->sum('value');
        $val7 = $this->getDiff($cnt7, $cnt7_old);

        $cnt8 = Stat::find()->where(['code' => 1617])->sum('value');
        $cnt8_old = Stat2::find()->where(['code' => 1617])->sum('value');
        $val8 = $this->getDiff($cnt8, $cnt8_old);

        $cnt9 = Stat::find()->where(['code' => 1617100])->sum('value');
        $cnt9_old = Stat2::find()->where(['code' => 1617100])->sum('value');
        $val9 = $this->getDiff($cnt9, $cnt9_old);

        $cnt10 = Stat::find()->where(['code' => 1617101])->sum('value');
        $cnt10_old = Stat2::find()->where(['code' => 1617101])->sum('value');
        $val10 = $this->getDiff($cnt10, $cnt10_old);

        $cnt11 = Stat::find()->where(['code' => 1617102])->sum('value');
        $cnt11_old = Stat2::find()->where(['code' => 1617102])->sum('value');
        $val11 = $this->getDiff($cnt11, $cnt11_old);

        $cnt12 = Stat::find()->where(['code' => 1618])->sum('value');
        $cnt12_old = Stat2::find()->where(['code' => 1618])->sum('value');
        $val12 = $this->getDiff($cnt12, $cnt12_old);

        $cnt13 = Stat::find()->where(['code' => 1618100])->sum('value');
        $cnt13_old = Stat2::find()->where(['code' => 1618100])->sum('value');
        $val13 = $this->getDiff($cnt13, $cnt13_old);

        $cnt14 = Stat::find()->where(['code' => 1618101])->sum('value');
        $cnt14_old = Stat2::find()->where(['code' => 1618101])->sum('value');
        $val14 = $this->getDiff($cnt14, $cnt14_old);

        $cnt15 = Stat::find()->where(['code' => 1618102])->sum('value');
        $cnt15_old = Stat2::find()->where(['code' => 1618102])->sum('value');
        $val15 = $this->getDiff($cnt15, $cnt15_old);

        $cnt16 = Stat::find()->where(['code' => 1619])->sum('value');
        $cnt16_old = Stat2::find()->where(['code' => 1619])->sum('value');
        $val16 = $this->getDiff($cnt16, $cnt16_old);

        $cnt17 = Stat::find()->where(['code' => 1620])->sum('value');
        $cnt17_old = Stat2::find()->where(['code' => 1620])->sum('value');
        $val17 = $this->getDiff($cnt17, $cnt17_old);

        $cnt18 = Stat::find()->where(['code' => 1621])->sum('value');
        $cnt18_old = Stat2::find()->where(['code' => 1621])->sum('value');
        $val18 = $this->getDiff($cnt18, $cnt18_old);

        $cnt19 = Stat::find()->where(['code' => 1622])->sum('value');
        $cnt19_old = Stat2::find()->where(['code' => 1622])->sum('value');
        $val19 = $this->getDiff($cnt19, $cnt19_old);

        return [
            'Боқувчисини йўқотган оилалар сони' => $val1,
            'Ёлғиз оналар/оталар сони' => $val2,
            'Ёлғиз кексалар сони' => $val3,
            'Камбағал оилалар сони' => $val4,
            '2 ёшгача нафақа олувчилар оилалар сони' => $val5,
            '14 ёшгача нафақа олувчилар оилалар сони' => $val6,
            'Моддий ёрдам олувчилар сони' => $val7,
            'Кўп болали оилалар сони' => $val8,
            '4-болали оилалар' => $val9,
            '5-болали оилалар' => $val10,
            '5-дан ортиқ болали оилалар' => $val11,
            'Ногиронлиги бўлган шахслар сони' => $val12,
            '1-гуруҳ ногирон' => $val13,
            '2-гуруҳ ногирон' => $val14,
            '3-гуруҳ ногирон' => $val15,
            'Ногиронлик нафақаси олувчилар сони' => $val16,
            'Оғир шароитга тушиб қолган аёллар сони' => $val17,
            'Иккинчи жаҳон уруши даврида фронт ва фронт ортида қатнашган ҳамда уларга тенглаштирилган фуқаролар сони' => $val18,
            'Байналминал жангчилар ва Чернобль АЭС ҳалокатини бартараф этишда иштирок этганлар сони' => $val19,
        ];
    }

    public function getCard4()
    {
        $cnt1 = Stat::find()->where(['code' => 1810])->sum('value');
        $cnt1_old = Stat2::find()->where(['code' => 1810])->sum('value');
        $val1 = $this->getDiff($cnt1, $cnt1_old);

        $cnt2 = Stat::find()->where(['code' => 1811])->sum('value');
        $cnt2_old = Stat2::find()->where(['code' => 1811])->sum('value');
        $val2 = $this->getDiff($cnt2, $cnt2_old);

        $cnt3 = Stat::find()->where(['code' => 1811100])->sum('value');
        $cnt3_old = Stat2::find()->where(['code' => 1811100])->sum('value');
        $val3 = $this->getDiff($cnt3, $cnt3_old);

        $cnt4 = Stat::find()->where(['code' => 1811101])->sum('value');
        $cnt4_old = Stat2::find()->where(['code' => 1811101])->sum('value');
        $val4 = $this->getDiff($cnt4, $cnt4_old);

        $cnt5 = Stat::find()->where(['code' => 1811102])->sum('value');
        $cnt5_old = Stat2::find()->where(['code' => 1811102])->sum('value');
        $val5 = $this->getDiff($cnt5, $cnt5_old);

        $cnt6 = Stat::find()->where(['code' => 1811103])->sum('value');
        $cnt6_old = Stat2::find()->where(['code' => 1811103])->sum('value');
        $val6 = $this->getDiff($cnt6, $cnt6_old);

        $cnt7 = Stat::find()->where(['code' => 1811104])->sum('value');
        $cnt7_old = Stat2::find()->where(['code' => 1811104])->sum('value');
        $val7 = $this->getDiff($cnt7, $cnt7_old);

        $cnt8 = Stat::find()->where(['code' => 1812])->sum('value');
        $cnt8_old = Stat2::find()->where(['code' => 1812])->sum('value');
        $val8 = $this->getDiff($cnt8, $cnt8_old);

        $cnt9 = Stat::find()->where(['code' => 1813])->sum('value');
        $cnt9_old = Stat2::find()->where(['code' => 1813])->sum('value');
        $val9 = $this->getDiff($cnt9, $cnt9_old);

        $cnt10 = Stat::find()->where(['code' => 1814])->sum('value');
        $cnt10_old = Stat2::find()->where(['code' => 1814])->sum('value');
        $val10 = $this->getDiff($cnt10, $cnt10_old);

        $cnt11 = Stat::find()->where(['code' => 1815])->sum('value');
        $cnt11_old = Stat2::find()->where(['code' => 1815])->sum('value');
        $val11 = $this->getDiff($cnt11, $cnt11_old);

        $cnt12 = Stat::find()->where(['code' => 1816])->sum('value');
        $cnt12_old = Stat2::find()->where(['code' => 1816])->sum('value');
        $val12 = $this->getDiff($cnt12, $cnt12_old);

        $cnt13 = Stat::find()->where(['code' => 1817])->sum('value');
        $cnt13_old = Stat2::find()->where(['code' => 1817])->sum('value');
        $val13 = $this->getDiff($cnt13, $cnt13_old);

        $cnt14 = Stat::find()->where(['code' => 1819])->sum('value');
        $cnt14_old = Stat2::find()->where(['code' => 1819])->sum('value');
        $val14 = $this->getDiff($cnt14, $cnt14_old);

        $cnt15 = Stat::find()->where(['code' => 1819100])->sum('value');
        $cnt15_old = Stat2::find()->where(['code' => 1819100])->sum('value');
        $val15 = $this->getDiff($cnt15, $cnt15_old);

        $cnt16 = Stat::find()->where(['code' => 1819101])->sum('value');
        $cnt16_old = Stat2::find()->where(['code' => 1819101])->sum('value');
        $val16 = $this->getDiff($cnt16, $cnt16_old);

        $cnt17 = Stat::find()->where(['code' => 1819102])->sum('value');
        $cnt17_old = Stat2::find()->where(['code' => 1819102])->sum('value');
        $val17 = $this->getDiff($cnt17, $cnt17_old);

        $cnt18 = Stat::find()->where(['code' => 1820])->sum('value');
        $cnt18_old = Stat2::find()->where(['code' => 1820])->sum('value');
        $val18 = $this->getDiff($cnt18, $cnt18_old);

        $cnt19 = Stat::find()->where(['code' => 1821])->sum('value');
        $cnt19_old = Stat2::find()->where(['code' => 1821])->sum('value');
        $val19 = $this->getDiff($cnt19, $cnt19_old);
        return [
            'Корхона ва ташкилотларда ишловчилар сони' => $val1,
            'Тадбиркорлик билан банд бўлганлар' => $val2,
            'касаначилик билан банд бўлганлар сони' => $val3,
            'миллий ҳунармандчилик билан шуғулланувчилар сони' => $val4,
            'савдо-сотиқ билан шуғулланувчилар сони' => $val5,
            'чорвачилик, паррандачилик ва асаларичилик билан банд бўлганлар сони' => $val6,
            'тадбиркорликнинг бошқа сохаларида банд бўлганлар сони' => $val7,
            'Мавсумий ишлар билан банд бўлганлар сони' => $val8,
            'Узоқ муддат хорижий давлатларга иш излаб кетганлар cони' => $val9,
            'Доимий иш билан банд бўлганлар сони' => $val10,
            'Бола парвариши билан банд бўлганлар сони' => $val11,
            'Ишловчи пенсионерлар сони' => $val12,
            'Талабалар сони' => $val13,
            'Ишсизлар сони' => $val14,
            'Ишсиз ёшлар (сони)' => $val15,
            'Ишсиз аёллар (сони)' => $val16,
            'Ишсиз бошқалар (сони)' => $val17,
            'Техникум коллежлар битирувчилари сони' => $val18,
            'Олий таълим муассасалари битирувчилари' => $val19,
        ];
    }

    public function getCard5()
    {
        $val1 = $this->getStatSum(2010);
        $val2 = $this->getStatSum(2011);
        $val3 = $this->getStatSum(2012);
        $val4 = $this->getStatSum(2013);
        $val5 = $this->getStatSum(2014);
        $val6 = $this->getStatSum(2015);
        $val7 = $this->getStatSum(2016);
        $val8 = $this->getStatSum(2017);
        $val9 = $this->getStatSum(2018);
        $val10 = $this->getStatSum(2019);
        $val11 = $this->getStatSum(2020);
        $val12 = $this->getStatSum(2021100);
        $val13 = $this->getStatSum(2021101);
        $val14 = $this->getStatSum(2021102);
        $val15 = $this->getStatSum(2021103);
        $val16 = $this->getStatSum(2021104);
        $val17 = $this->getStatSum(2021105);
        $val18 = $this->getStatSum(2021106);
        $val19 = $this->getStatSum(2022);
        $val20 = $this->getStatSum(2023);
        $val21 = $this->getStatSum(2023100);
        $val22 = $this->getStatSum(2023101);
        $val23 = $this->getStatSum(2023102);
        $val24 = $this->getStatSum(2023103);
        $val25 = $this->getStatSum(2024);
        $val26 = $this->getStatSum(2025);
        $val27 = $this->getStatSum(2025100);
        $val28 = $this->getStatSum(2025101);
        $val29 = $this->getStatSum(2025102);
        $val30 = $this->getStatSum(2025103);
        $val31 = $this->getStatSum(2025104);
        $val32 = $this->getStatSum(2025105);
        $val33 = $this->getStatSum(2025106);
        $val34 = $this->getStatSum(2025107);
        $val35 = $this->getStatSum(2025108);
        $val36 = $this->getStatSum(2025109);
        $val37 = $this->getStatSum(2025110);
        $val38 = $this->getStatSum(2026);
        $val39 = $this->getStatSum(2026100);
        $val40 = $this->getStatSum(2026101);
        $val41 = $this->getStatSum(2026102);
        $val42 = $this->getStatSum(2026103);
        $val43 = $this->getStatSum(2026104);

        return [
            [['Нотинч оилалар', $val1], ['Аниқланган жиноятлар', $val25]],
            [['Ноқобил (фарзанд тарбиясига салбий таъсир кўрсатувчи ота-оналар) оилалар', $val2], ['Маҳалла ҳудудида содир этилган жиноятлар (8-илова 3-банд)', $val26]],
            [['ЖЭМда жазо ўтаётганлар', $val3], ['Қасддан одам ўлдириш', $val27]],
            [['ЖЭМда жазо муддати ўтаб қайтганлар', $val4], ['Қасддан баданга оғир шикаст етказиш', $val28]],
            [['Озодликдан маҳрум қилиш билан боғлиқ бўлмаган жазоларни ўтаётган маҳкумлар сони', $val5], ['Қасддан баданга ўрта-ча оғир шикаст етказиш', $val29]],
            [['Ўз жонига қасд ва суиқасд қилиш ҳолати', $val6], ['Қасддан баданга енгил шикаст етказиш', $val30]],
            [['Ўз жонига қасд қилиш ҳолати', $val7], ['Номусга тегиш', $val31]],
            [['Суиқасд қилиш ҳолати', $val8], ['Босқинчилик', $val32]],
            [['Чет эл давлатларидан депортация қилинганлар', $val9], ['Талончилик', $val33]],
            [['Одам савдоси билан боғлиқ жиноятлардан жабр кўрганлар сони', $val10], ['Ўғирлик', $val34]],
            [['Жами профилактик ҳисобда турган шахслар', $val11], ['Гиёхвандлик', $val35]],
            [['Профилактик ҳисобда турган фоҳиша аёллар', $val12], ['Безорилик', $val36]],
            [['Профилактик ҳисобда турган қўшмачилар', $val13], ['Бошқа турдаги жиноятлар', $val37]],
            [['Профилактик ҳисобда турган ижтимоий кўмакка муҳтож шахслар (диний экстремистик оқим тоифасига мансуб бўлганлар)', $val14], ['Жами иштирок этган шахслар сони', $val38]],
            [['Соғлиқни сақлаш муассасалари ҳисобида турганлар', $val15], ['Маҳалла ҳудудида доимий яшайдиганлар', $val39]],
            [['Гиёҳвандлар ва заҳарвандлар', $val16], ['Туманнинг бошқа маҳал-ласида яшовчи шахслар', $val40]],
            [['Спиртли ичимликка ружу қўйган шахслар', $val17], ['Бошқа шаҳар-туманларда яшовчи шахслар', $val41]],
            [['Руҳий касаллар', $val18], ['Бошқа вилоятларда яшовчи шахслар', $val42]],
            [['Содир этилган ҳуқуқбузарликлар', $val19], ['Чет эл фуқаролари', $val43]],
            [['Содир этилган жиноятлар', $val20], ['', '']],
            [['Махсус объектларда (ЖИЭМ, чегара, божхона) содир этиладиган жиноятлар', $val21], ['', '']],
            [['Эҳтиётсизлик оқибатида содир этиладиган жиноятлар', $val22], ['', '']],
            [['Иқтисодиёт ва ҳокимият органларининг фаолияти билан боғлиқ жиноятлар', $val23], ['', '']],
            [['Касбий ёки хизмат вазифани бажариш (шу жумладан, ҳарбий хизматни ўташ тартиби) билан боғлиқ жиноятлар', $val24], ['', '']],
        ];
    }

    public function getCard6()
    {
        $val1 = $this->getStatSum(2410);
        $val2 = $this->getStatSum(2411);
        $val3 = $this->getStatSum(2412);
        $val4 = $this->getStatSum(2413);
        $val5 = $this->getStatSum(2413100);
        $val6 = $this->getStatSum(2413101);
        $val7 = $this->getStatSum(2413102);
        $val8 = $this->getStatSum(2413103);
        $val9 = $this->getStatSum(2413104);
        $val10 = $this->getStatSum(2414);
        $val11 = $this->getStatSum(2415);
        $val12 = $this->getStatSum(2416);
        $val13 = $this->getStatSum(2417);
        $val14 = $this->getStatSum(2418);
        $val15 = $this->getStatSum(2419);
        $val16 = $this->getStatSum(2420);
        $val17 = $this->getStatSum(2420100);
        $val18 = $this->getStatSum(2420101);
        $val19 = $this->getStatSum(2421);
        $val20 = $this->getStatSum(2422);
        $val21 = $this->getStatSum(2423);
        $val22 = $this->getStatSum(2424);
        $val23 = $this->getStatSum(2425);
        $val24 = $this->getStatSum(2426);
        $val25 = $this->getStatSum(2427);
        $val26 = $this->getStatSum(2428);
        $val27 = $this->getStatSum(2429);
        $val28 = $this->getStatSum(2430);

        return [
            [['Маҳалла гузари сони', $val1], ['Ўқитиш ва ўргатиш марказлари сони', $val15]],
            [['Кутубхоналар сони', $val2], ['Шифохоналар сони', $val16]],
            [['Савдо дўконлари сони', $val3], ['- Оилавий поликлиникалар сони', $val17]],
            [['Бозорлар сони', $val4], ['- Қишлоқ оилавий (врачлик) пункти сони', $val18]],
            [['- деҳқон бозорлари сони', $val5], ['Санаториялар сони', $val19]],
            [['- буюм бозорлари сони', $val6], ['Болалар оромгоҳлари сони', $val20]],
            [['- чорва (мол) бозорлари сони', $val7], ['Фермер хўжаликлари сони', $val21]],
            [[' улгуржи бозорлар сони', $val8], ['Спорт майдончалари сони', $val22]],
            [['- кичик бозорчалар (бозорлар филиали ёки шахобчалари)', $val9], ['Аҳоли дам олиш марказлари сони', $val23]],
            [['Тўйхоналар сони', $val10], ['Масжидлар сони', $val24]],
            [['Умумий овқатланиш шохобчалари сони', $val11], ['Бошқа диний ибодатхоналар сони', $val25]],
            [['Кафе, Ресторан,бар', $val12], ['Зиёратгоҳлар сони', $val26]],
            [['Интернет клублар сони', $val13], ['Қабристонлар сони', $val27]],
            [['Дорихоналар сони', $val14], ['Маҳалла ҳудудида жойлашган вазирлик, идора, ташкилотлар, муассасалар ва уларнинг қуйи тузилмалари сони', $val28]],
        ];
    }

    public function getCard7()
    {
        $val1 = $this->getStatSum(2610);
        $val2 = $this->getStatSum(2610100);
        $val3 = $this->getStatSum(2610101);
        $val4 = $this->getStatSum(2610102);
        $val5 = $this->getStatSum(2610103);
        $val6 = $this->getStatSum(2610104);
        $val7 = $this->getStatSum(2610105);
        $val8 = $this->getStatSum(2610106);
        $val9 = $this->getStatSum(2610107);
        $val10 = $this->getStatSum(2610108);
        $val11 = $this->getStatSum(2611);
        $val12 = $this->getStatSum(2612);
        $val13 = $this->getStatSum(2613);
        $val14 = $this->getStatSum(2614);
        $val15 = $this->getStatSum(2615);
        $val16 = $this->getStatSum(2617);
        $val17 = $this->getStatSum(2618);
        $val18 = $this->getStatSum(2619);
        $val19 = $this->getStatSum(2619100);
        $val20 = $this->getStatSum(2619101);
        $val21 = $this->getStatSum(2620);
        $val22 = $this->getStatSum(2621);
        $val23 = $this->getStatSum(2622);
        $val24 = $this->getStatSum(2622100);
        $val25 = $this->getStatSum(2622101);
        $val26 = $this->getStatSum(2623);
        $val27 = $this->getStatSum(2624);
        $val28 = $this->getStatSum(2625);
        $val29 = $this->getStatSum(2626);
        $val30 = $this->getStatSum(2627);
        $val31 = $this->getStatSum(2628);
        $val32 = $this->getStatSum(2628100);
        $val33 = $this->getStatSum(2628101);
        $val34 = $this->getStatSum(2629);
        $val35 = $this->getStatSum(2630);
        $val36 = $this->getStatSum(2631);
        $val37 = $this->getStatSum(2632);
        $val38 = $this->getStatSum(2633);
        $val39 = $this->getStatSum(2633100);
        $val40 = $this->getStatSum(2633101);
        $val41 = $this->getStatSum(2633102);
        $val42 = $this->getStatSum(2633103);
        $val43 = $this->getStatSum(2633103);

        return [
            [['Таълим муассасалари сони', $val1], ['Мактаблар қуввати', $val23]],
            [['Мактабгача таълим муассасалари сони', $val2], ['Мактаблардаги ўқувчилари сони', $val24]],
            [['Мактаблар сони', $val3], ['Жорий МФЙ дан ўқувчилар сони', $val25]],
            [['Мусиқа ва санъат мактаблари', $val4], ['Бошқа МФЙ дан ўқувчилар сони', $val26]],
            [['Болалар ва ўсмирлар спорт мактаблари сони', $val5], ['Мактаблардаги гурухлар сони', $val27]],
            [['Ихтисослашган спорт мактаблари', $val6], ['Гурухлардаги ўқувчиларни ўртача сони', $val28]],
            [['Лицейлар сони', $val7], ['2-сменадаги ўқувчилар сони', $val29]],
            [['Коллежлар сони', $val8], ['Охирги йилдаги битрувчилар сони', $val30]],
            [['Техникумлар сони', $val9], ['Шундан ОТМ га кирганлар сони', $val31]],
            [['Олий ўқув юртлари сони', $val10], ['Ўқитувчилар сони', $val32]],
            [['Мусиқа ва санъат мактабларига борадиган ўқувчилар сони', $val11], ['Эркак ўқитувчилар сони', $val33]],
            [['Болалар ва ўсмирлар спорт мактабларига борадиган ўқувчилар сони', $val12], ['Аёл ўқитувчилар сони', $val34]],
            [['Ихтисослашган спорт мактабларига борадиган ўқувчилар сони', $val13], ['Олий тоифали ўқитувчилар сони', $val35]],
            [['Лицейларга борадиган ўқувчилар сони', $val14], ['1-тоифали ўқитувчилар сони', $val36]],
            [['Коллежларга борадиган ўқувчилар сони', $val15], ['2-тоифали ўқитувчилар сони', $val37]],
            [['Техникумларга борадиган талабалар сони', $val16], ['Тоифасиз ўқитувчилар сони', $val38]],
            [['Олий ўқув юртларига борадиган талабалар сони', $val17], ['Олимпиадаларда  иштирок этган ўқувчилар сони', $val39]],
            [['Мактабгача таълим муассасалари қуввати', $val18], ['Мактабда', $val40]],
            [['Мактабгача таълим муассасаларига борадиган тарбияланувчилар сони', $val19], ['Туманда', $val41]],
            [['Joriy MFY dan keladigan tarbiyalanuvchilar сони', $val20], ['Вилоятда', $val42]],
            [['Boshqa MFY dan keladigan tarbiyalanuvchilar сони', $val21], ['Республикада', $val43]],
            [['MTM yoshdagi bolalar umumiy soni', $val22], ['', '']],


        ];
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $card1 = $this->getCard1();
        $card2 = $this->getCard2();
        $card3 = $this->getCard3();
        $card4 = $this->getCard4();
        $card5 = $this->getCard5();
        $card6 = $this->getCard6();
        $card7 = $this->getCard7();

        $regions = Soato::find()
            ->select(['region_id', 'name_lot'])
            ->where(['not', ['region_id' => null]])
            ->andWhere(['district_id' => null])
            ->all();

        return $this->render('index', [
            'card1' => $card1,
            'card2' => $card2,
            'card3' => $card3,
            'card4' => $card4,
            'card5' => $card5,
            'card6' => $card6,
            'card7' => $card7,
            'regions' => $regions
        ]);
    }


    public function actionPro()
    {
        $model = DistrictView::find()->all();

        $client = new Client();


        foreach ($model as $item) {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('https://pm.gov.uz:8020/dictionary/mahalla?district_id=' . $item->id)
                ->send();
            if ($response->isOk) {
                foreach ($response->data as $i) {
                    $res_id = substr($i['id'], 0, 2);
                    $reg_id = substr($i['id'], 2, 2);
                    $dis_id = substr($i['id'], 4, 3);
                    $qfi_id = substr($i['id'], 7, 3);
                    $mah_id = substr($i['id'], 10, 4);
                    echo $res_id . ' ' . $reg_id . ' ' . $dis_id . ' ' . $qfi_id . ' ' . $mah_id . '-' . $i['id'] . '<br>';

                    $mahalla = new Soato();
                    $mahalla->id = $i['id'];
                    $mahalla->res_id = $res_id;
                    $mahalla->region_id = $reg_id;
                    $mahalla->district_id = $dis_id;
                    $mahalla->qfi_id = $qfi_id;
                    $mahalla->mahalla_id = $mah_id;
                    $mahalla->name_lot = $i['title'];
                    $mahalla->name_cyr = $i['title'];
                    $mahalla->name_ru = $i['title'];
                    $mahalla->save();


                }
            }
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect([Yii::$app->user->identity->role->url]);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @return yii\web\Response
     * @throws BadRequestHttpException
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionDistricts($region_id){
        $districts = Soato::find()
            ->select(['district_id', 'name_lot'])
            ->where(['region_id' => $region_id])
            ->andWhere(['not', ['district_id' => null]])
            ->andWhere(['not', ['center_lot' => null]])
            ->all();
        return $this->asJson($districts);
    }
    public function actionMahallas($region_id, $district_id){
        $mahallas = Soato::find()
            ->select(['mahalla_id', 'name_lot', 'id'])
            ->where(['region_id' => $region_id])
            ->andWhere(['district_id' => $district_id])
            ->andWhere(['not', ['mahalla_id' => null]])
            ->all();
        return $this->asJson($mahallas);
    }

    public function actionMahalla($soato_id){
        $mahalla = Soato::findOne($soato_id);
        $val1 = $this->getMahallaVal($soato_id, 1210);
        $val2 = $this->getMahallaVal($soato_id, 1211);
        $val3 = $this->getMahallaVal($soato_id, 1212);
        $val4 = $this->getMahallaVal($soato_id, 1213);
        $val5 = $this->getMahallaVal($soato_id, 1214);
        $val6 = $this->getMahallaVal($soato_id, 1215);
        $val7 = $this->getMahallaVal($soato_id, 1216);
        $val8 = $this->getMahallaVal($soato_id, 1217);
        $val9 = $this->getMahallaVal($soato_id, 1218);
        $val10 = $this->getMahallaVal($soato_id, 1219);
        $val11 = $this->getMahallaVal($soato_id, 1220);
        $val12 = $this->getMahallaVal($soato_id, 1221);
        $val13 = $this->getMahallaVal($soato_id, 1222);
        if ($val13) {
            $val13 = Html::img('/uploads/' . $val13, ['width' => '400px']);
        }
        $val14 = $this->getMahallaVal($soato_id, 1223);
        $val15 = $this->getMahallaVal($soato_id, 1224);
        $val16 = $this->getMahallaVal($soato_id, 1225);
        $card = [
            'Раиснинг Ф.И.О.' => $val1,
            'Раиснинг mаълумоти (олий, ўрта махсус, ўрта)' => $val2,
            'Раиснинг мутахассислиги ' => $val3,
            'Раиснинг ёши (Туғилган йили)' => $val4,
            'Раиснинг  телефон рақами (ишхона):' => $val5,
            'Раиснинг телефон рақами (мобил):' => $val6,
            'Профилактика (катта) инспектори Ф.И.О.' => $val7,
            'Профилактика (катта) инспектори телефон рақами' => $val8,
            'Ёшлар етакчиси Ф.И.О.' => $val9,
            'Ёшлар етакчиси телефон рақами' => $val10,
            'Хоким ўринбосари Ф.И.О' => $val11,
            'Хоким ўринбосари телефон рақами' => $val12,
            'Худуднинг карта тасвири' => $val13,
            'Аҳолининг асосий даромад манбаи' => $val14,
            'Xotin -qizlar faoli FIO' => $val15,
            'Xotin -qizlar faoli telefon raqami' => $val16,
        ];
        return $this->renderPartial('cards/mahalla', [
            'card' => $card,
            'mahalla' => $mahalla
        ]);
    }

    private function getMahallaVal($soato_id, $code){
        $obj = Stat::findOne(['soato_id' => $soato_id, 'code' => $code]);
        if ($obj){
            return $obj->value;
        }
        return null;
    }
}
