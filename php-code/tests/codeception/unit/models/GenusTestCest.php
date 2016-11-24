<?php
namespace models;
use app\models\AdoptForm;
use \UnitTester;

class GenusTestCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    /**
     * @param UnitTester $I
     */
    public function tryAdoptWrongDataTest(UnitTester $I)
    {
        $I->wantTo('Fill adopt form with wrong data');

        $model = new AdoptForm([
            'userId' => '1',
            'genusId' => '4',
        ]);
        $I->assertFalse($model->adopt(),'assert fail with wrong data');
    }
}
