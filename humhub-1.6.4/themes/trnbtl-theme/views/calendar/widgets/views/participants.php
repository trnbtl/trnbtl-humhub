<?php

use humhub\widgets\ModalButton;
use humhub\modules\calendar\helpers\Url;
use humhub\modules\calendar\models\CalendarEntry;
use humhub\modules\calendar\models\CalendarEntryParticipant;

/* @var $calendarEntry CalendarEntry */
/* @var $countAttending integer */
/* @var $countMaybe integer */
/* @var $countDeclined integer */

?>

<?php if ($calendarEntry->participation->isEnabled()) : ?>
    <div class="calendar-entry-participants-heading">
        <i class="fa fa-users"></i> <?= Yii::t('CalendarModule.widgets_views_participants', 'Participants:'); ?>
    </div>
    
    <?php $title = Yii::t('CalendarModule.widgets_views_participants', ":count attending", [':count' => $countAttending]); ?>
    <?php if ($countAttending > 0) : ?>
        <span class="calendar-entry-participants-status">
        
            <?= ModalButton::instance($title)
                ->load(Url::toParticipationUserList($calendarEntry, CalendarEntryParticipant::PARTICIPATION_STATE_ACCEPTED))
                ->link()->cssClass('colorSuccess')?>
        </span>
        <?php else : ?>
            <span class="calendar-entry-participants-status">
                <?= $title; ?>
            </span>
        <?php endif ?>
            
        <?php if($calendarEntry->allow_maybe) : ?>
            &middot;
            <?php $title = Yii::t('CalendarModule.widgets_views_participants', ":count maybe", [':count' => $countMaybe]); ?>
            <?php if ($countMaybe > 0) : ?>
                <span class="calendar-entry-participants-status">
                    <?= ModalButton::instance($title)
                    ->load(Url::toParticipationUserList($calendarEntry, CalendarEntryParticipant::PARTICIPATION_STATE_MAYBE))
                    ->link()->cssClass('colorInfo') ?>
                </span>
        <?php else : ?>
            <span class="calendar-entry-participants-status">
                <?= $title; ?>
            </span>
        <?php endif ?>
    <?php endif ?>

    <?php if($calendarEntry->allow_decline) : ?>
         &middot;
        <?php $title = Yii::t('CalendarModule.widgets_views_participants', ":count declined", [':count' => $countDeclined]); ?>
        <?php if ($countDeclined > 0) : ?>
            <span class="calendar-entry-participants-status">
                <?= ModalButton::instance($title)
                ->load(Url::toParticipationUserList($calendarEntry, CalendarEntryParticipant::PARTICIPATION_STATE_DECLINED))
                ->link()->cssClass('colorWarning') ?>
            </span>
        <?php else : ?>
            <span class="calendar-entry-participants-status">
                <?= $title; ?>
            </span>
        <?php endif ?>
    <?php endif ?>

    <br>
<?php endif; ?>