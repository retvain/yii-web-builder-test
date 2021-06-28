<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\User;
use app\assets\siteUsersAsset;

siteUsersAsset::register($this);

?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4>ajax users</h4>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label>born_date</label>
                <input type="text" name="born_date" id="born_date" class="form-control" value="1999-01-01">
            </div>
            <div class="form-group">
                <label>city</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>
            <div class="form-group">
                <label>phone_number</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control">
            </div>
            <button id="SaveUserToBd">Save user</button>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">name</th>
                    <th scope="col">city</th>
                    <th scope="col">born_date</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="users">


                </tbody>
            </table>
        </div>
        <div class="col-4">

            <h4>ajax comments</h4>

            <div class="form-group">
                <label>text</label>
                <textarea class="form-control" id="text" name="text"></textarea>
            </div>
            <div class="form-group">
                <label>date</label>
                <input type="text" name="date" id="date" class="form-control" value="2021-06-21"> <br>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">user_id</label>
                </div>
                <select class="custom-select" name="user_id" id="user_id">

                </select>
            </div>
            <div class="form-group">
                <label>Published</label>
                <input type="checkbox" aria-label="Checkbox for following text input" name="published" id="published">
            </div>

            <button id="SaveCommentToBd">Save comment</button>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">user_id</th>
                    <th scope="col">date</th>
                    <th scope="col">text</th>
                    <th scope="col">published</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody id="comments">


                </tbody>
            </table>


        </div>

    </div>
</div>

