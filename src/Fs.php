<?php

declare(strict_types=1);

namespace Sulao\CraftQiniu;

use Craft;
use craft\behaviors\EnvAttributeParserBehavior;
use craft\flysystem\base\FlysystemFs;
use craft\helpers\App;
use craft\helpers\Assets;
use League\Flysystem\FilesystemAdapter;
use Overtrue\Flysystem\Qiniu\QiniuAdapter;

class Fs extends FlysystemFs
{
    public string $accessKey = '';
    public string $secretKey = '';
    public string $bucket = '';
    public string $domain = '';

    public static function displayName(): string
    {
        return 'Qiniu';
    }

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['parser'] = [
            'class'      => EnvAttributeParserBehavior::class,
            'attributes' => ['accessKey', 'secretKey', 'bucket', 'domain'],
        ];

        return $behaviors;
    }

    protected function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            [['accessKey', 'secretKey', 'bucket', 'domain'], 'required'],
        ]);
    }

    public function getSettingsHtml(): ?string
    {
        return Craft::$app->getView()->renderTemplate('craft-qiniu/fsSettings', [
            'fs'      => $this,
            'periods' => array_merge(['' => ''], Assets::periodList()),
        ]);
    }

    protected function createAdapter(): FilesystemAdapter
    {
        return new QiniuAdapter(
            App::parseEnv($this->accessKey),
            App::parseEnv($this->secretKey),
            App::parseEnv($this->bucket),
            App::parseEnv($this->domain)
        );
    }

    protected function invalidateCdnPath(string $path): bool
    {
        return true;
    }
}
