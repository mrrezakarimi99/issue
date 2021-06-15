<?php

namespace RezaKarimi\ServiceDesk\ValueObjects;

use Webmozart\Assert\Assert;

class IssueRequestPayload
{

    const STATUS_IN_PROGRESS = 'IN-PROGRESS';
    const STATUS_RESOLVED = 'RESOLVED';
    const STATUS_CANCELED = 'CANCELED';

    const PRIORITY_CRITICAL = 'CRITICAL';
    const PRIORITY_HIGH = 'HIGH';
    const PRIORITY_LOW = 'LOW';

    const STATUSES = [
        self::STATUS_CANCELED,
        self::STATUS_IN_PROGRESS,
        self::STATUS_RESOLVED
    ];

    const PRIORITIES = [
        self::PRIORITY_CRITICAL,
        self::PRIORITY_HIGH,
        self::PRIORITY_LOW
    ];
    /**
     * @var string
     */
    private $tenant_name;
    /**
     * @var string
     */
    private $tenant_id;
    /**
     * @var string
     */
    private $accommodation_id;
    /**
     * @var string
     */
    private $accommodation_name;
    /**
     * @var string|null
     */
    private $channel_name;
    /**
     * @var string|null
     */
    private $channel_id;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $service;
    /**
     * @var string
     */
    private $priority;
    /**
     * @var string
     */
    private $status;

    public static function create(
        string $tenant_name,
        string $tenant_id,
        string $accommodation_id,
        string $accommodation_name,
        ?string $channel_name,
        ?string $channel_id,
        string $description,
        string $priority,
        string $status,
        string $service
    )
    {
        Assert::stringNotEmpty($tenant_name, 'tenant_name type is required.');
        Assert::stringNotEmpty($tenant_id, 'tenant_id type is required.');
        Assert::stringNotEmpty($accommodation_id, 'accommodation_id type is required.');
        Assert::stringNotEmpty($accommodation_name, 'accommodation_name type is required.');
        Assert::stringNotEmpty($description, 'description type is required.');
        Assert::oneOf($priority, self::PRIORITIES, 'priority It should be one of the following' . implode(', ', self::PRIORITIES));
        Assert::oneOf($status, self::STATUSES, 'status It should be one of the following' . implode(', ', self::STATUSES));
        Assert::stringNotEmpty($service, 'service type is required.');
        $instance = new self();
        $instance->tenant_name = $tenant_name;
        $instance->tenant_id = $tenant_id;
        $instance->accommodation_id = $accommodation_id;
        $instance->accommodation_name = $accommodation_name;
        $instance->channel_name = $channel_name;
        $instance->channel_id = $channel_id;
        $instance->description = $description;
        $instance->priority = $priority;
        $instance->status = $status;
        $instance->service = $service;
        return $instance;
    }

    /**
     * @return string
     */
    public function getTenantName(): string
    {
        return $this->tenant_name;
    }

    /**
     * @return string
     */
    public function getTenantId(): string
    {
        return $this->tenant_id;
    }

    /**
     * @return string
     */
    public function getAccommodationId(): string
    {
        return $this->accommodation_id;
    }

    /**
     * @return string
     */
    public function getAccommodationName(): string
    {
        return $this->accommodation_name;
    }

    /**
     * @return string|null
     */
    public function getChannelName(): ?string
    {
        return $this->channel_name;
    }

    /**
     * @return string|null
     */
    public function getChannelId(): ?string
    {
        return $this->channel_id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    public function payloadToArray()
    {
        return [
            "tenant_name" => $this->tenant_name,
            "tenant_id" => $this->tenant_id,
            "accommodation_id" => $this->accommodation_id,
            "accommodation_name" => $this->accommodation_name,
            "channel_name" => $this->channel_name,
            "channel_id" => $this->channel_id,
            "description" => $this->description,
            "priority" => $this->priority,
            "status" => $this->status,
            "service" => $this->service,
        ];
    }

}
