<?php

namespace Conceptlz\AdobeSign\Generated\Model;

class FormFieldDescription
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * The type of radio button (if field is radio button, identified by inputType).
     *
     * @var string|null
     */
    protected $radioCheckType;
    /**
     * Color of the border of the field in RGB or HEX format
     *
     * @var string|null
     */
    protected $borderColor;
    /**
     * Expression to calculate value of the form field
     *
     * @var string|null
     */
    protected $valueExpression;
    /**
     * Text to mask the masked form field
     *
     * @var string|null
     */
    protected $maskingText;
    /**
     * Default value of the form field
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * true if the input entered by the signer has to be masked (like password), false if it shouldn't be
     *
     * @var bool|null
     */
    protected $masked;
    /**
     * Minimum length of the input text field in terms of no. of characters
     *
     * @var int|null
     */
    protected $minLength;
    /**
     * Origin of Form Field
     *
     * @var string|null
     */
    protected $origin;
    /**
     * Tooltip text for the form field
     *
     * @var string|null
     */
    protected $tooltip;
    /**
     * Text values which are hidden in a drop down form field
     *
     * @var list<string>|null
     */
    protected $hiddenOptions;
    /**
     * true if it is a mandatory field to be filled by the signer, else false
     *
     * @var bool|null
     */
    protected $required;
    /**
     * Further data for validating input with regards to the field's specified format. The contents and interpretation of formatData depends on the value of validation.
     *
     * @var string|null
     */
    protected $validationData;
    /**
     * Lower bound of the number that can be entered by the signer
     *
     * @var float|null
     */
    protected $minValue;
    /**
     * Width of the border of the field in default user space units
     *
     * @var float|null
     */
    protected $borderWidth;
    /**
     * For web form text fields only - true if the default value may come from the URL, else false
     *
     * @var bool|null
     */
    protected $urlOverridable;
    /**
     * A currency ISO code. Only applicable for payment form fields. Should be one of the currencies supported in the payment integration merchant accounts.
     *
     * @var string|null
     */
    protected $currency;
    /**
     * Input type of the form field
     *
     * @var string|null
     */
    protected $inputType;
    /**
     * Style of the border of the field.
     *
     * @var string|null
     */
    protected $borderStyle;
    /**
     * true if this field's value is calculated from an expression, else false
     *
     * @var bool|null
     */
    protected $calculated;
    /**
     * Content Type of the form field.
     *
     * @var string|null
     */
    protected $contentType;
    /**
     * Rule for validating the field value.
     *
     * @var string|null
     */
    protected $validation;
    /**
     * Display label attached to the field
     *
     * @var string|null
     */
    protected $displayLabel;
    /**
     * Hyperlink-specific data for hyperlink form fields
     *
     * @var FormFieldHyperlink|null
     */
    protected $hyperlink;
    /**
     * Background color of the form field in RGB or HEX format
     *
     * @var string|null
     */
    protected $backgroundColor;
    /**
     * If set to false, then the form field is hidden.  Otherwise, it is visible.
     *
     * @var bool|null
     */
    protected $visible;
    /**
     * Format type of the text field.
     *
     * @var string|null
     */
    protected $displayFormatType;
    /**
     * Upper bound of the number that can be entered by the signer
     *
     * @var float|null
     */
    protected $maxValue;
    /**
     * Error message to be shown to the signer if filled value doesn't match the validations of the form field
     *
     * @var string|null
     */
    protected $validationErrMsg;
    /**
     * Format of the value of the field to be displayed based on the displayFormatType property.
     *
     * @var string|null
     */
    protected $displayFormat;
    /**
     * Text values which are visible in a drop down form field
     *
     * @var list<string>|null
     */
    protected $visibleOptions;
    /**
     * true if it is a read-only field, else false
     *
     * @var bool|null
     */
    protected $readOnly;
    /**
     * Font name of the form field
     *
     * @var string|null
     */
    protected $fontName;
    /**
     * Conditional actions to perfom on this form field.
     *
     * @var FormFieldConditionalAction|null
     */
    protected $conditionalAction;
    /**
     * Font size of the form field in points
     *
     * @var float|null
     */
    protected $fontSize;
    /**
     * Alignment of the text.
     *
     * @var string|null
     */
    protected $alignment;
    /**
     * Font color of the form field in RGB or HEX format
     *
     * @var string|null
     */
    protected $fontColor;
    /**
     * Maximum length of the input text field in terms of no. of characters
     *
     * @var int|null
     */
    protected $maxLength;
    /**
     * The type of radio button (if field is radio button, identified by inputType).
     *
     * @return string|null
     */
    public function getRadioCheckType(): ?string
    {
        return $this->radioCheckType;
    }
    /**
     * The type of radio button (if field is radio button, identified by inputType).
     *
     * @param string|null $radioCheckType
     *
     * @return self
     */
    public function setRadioCheckType(?string $radioCheckType): self
    {
        $this->initialized['radioCheckType'] = true;
        $this->radioCheckType = $radioCheckType;
        return $this;
    }
    /**
     * Color of the border of the field in RGB or HEX format
     *
     * @return string|null
     */
    public function getBorderColor(): ?string
    {
        return $this->borderColor;
    }
    /**
     * Color of the border of the field in RGB or HEX format
     *
     * @param string|null $borderColor
     *
     * @return self
     */
    public function setBorderColor(?string $borderColor): self
    {
        $this->initialized['borderColor'] = true;
        $this->borderColor = $borderColor;
        return $this;
    }
    /**
     * Expression to calculate value of the form field
     *
     * @return string|null
     */
    public function getValueExpression(): ?string
    {
        return $this->valueExpression;
    }
    /**
     * Expression to calculate value of the form field
     *
     * @param string|null $valueExpression
     *
     * @return self
     */
    public function setValueExpression(?string $valueExpression): self
    {
        $this->initialized['valueExpression'] = true;
        $this->valueExpression = $valueExpression;
        return $this;
    }
    /**
     * Text to mask the masked form field
     *
     * @return string|null
     */
    public function getMaskingText(): ?string
    {
        return $this->maskingText;
    }
    /**
     * Text to mask the masked form field
     *
     * @param string|null $maskingText
     *
     * @return self
     */
    public function setMaskingText(?string $maskingText): self
    {
        $this->initialized['maskingText'] = true;
        $this->maskingText = $maskingText;
        return $this;
    }
    /**
     * Default value of the form field
     *
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }
    /**
     * Default value of the form field
     *
     * @param string|null $defaultValue
     *
     * @return self
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;
        return $this;
    }
    /**
     * true if the input entered by the signer has to be masked (like password), false if it shouldn't be
     *
     * @return bool|null
     */
    public function getMasked(): ?bool
    {
        return $this->masked;
    }
    /**
     * true if the input entered by the signer has to be masked (like password), false if it shouldn't be
     *
     * @param bool|null $masked
     *
     * @return self
     */
    public function setMasked(?bool $masked): self
    {
        $this->initialized['masked'] = true;
        $this->masked = $masked;
        return $this;
    }
    /**
     * Minimum length of the input text field in terms of no. of characters
     *
     * @return int|null
     */
    public function getMinLength(): ?int
    {
        return $this->minLength;
    }
    /**
     * Minimum length of the input text field in terms of no. of characters
     *
     * @param int|null $minLength
     *
     * @return self
     */
    public function setMinLength(?int $minLength): self
    {
        $this->initialized['minLength'] = true;
        $this->minLength = $minLength;
        return $this;
    }
    /**
     * Origin of Form Field
     *
     * @return string|null
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }
    /**
     * Origin of Form Field
     *
     * @param string|null $origin
     *
     * @return self
     */
    public function setOrigin(?string $origin): self
    {
        $this->initialized['origin'] = true;
        $this->origin = $origin;
        return $this;
    }
    /**
     * Tooltip text for the form field
     *
     * @return string|null
     */
    public function getTooltip(): ?string
    {
        return $this->tooltip;
    }
    /**
     * Tooltip text for the form field
     *
     * @param string|null $tooltip
     *
     * @return self
     */
    public function setTooltip(?string $tooltip): self
    {
        $this->initialized['tooltip'] = true;
        $this->tooltip = $tooltip;
        return $this;
    }
    /**
     * Text values which are hidden in a drop down form field
     *
     * @return list<string>|null
     */
    public function getHiddenOptions(): ?array
    {
        return $this->hiddenOptions;
    }
    /**
     * Text values which are hidden in a drop down form field
     *
     * @param list<string>|null $hiddenOptions
     *
     * @return self
     */
    public function setHiddenOptions(?array $hiddenOptions): self
    {
        $this->initialized['hiddenOptions'] = true;
        $this->hiddenOptions = $hiddenOptions;
        return $this;
    }
    /**
     * true if it is a mandatory field to be filled by the signer, else false
     *
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }
    /**
     * true if it is a mandatory field to be filled by the signer, else false
     *
     * @param bool|null $required
     *
     * @return self
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;
        return $this;
    }
    /**
     * Further data for validating input with regards to the field's specified format. The contents and interpretation of formatData depends on the value of validation.
     *
     * @return string|null
     */
    public function getValidationData(): ?string
    {
        return $this->validationData;
    }
    /**
     * Further data for validating input with regards to the field's specified format. The contents and interpretation of formatData depends on the value of validation.
     *
     * @param string|null $validationData
     *
     * @return self
     */
    public function setValidationData(?string $validationData): self
    {
        $this->initialized['validationData'] = true;
        $this->validationData = $validationData;
        return $this;
    }
    /**
     * Lower bound of the number that can be entered by the signer
     *
     * @return float|null
     */
    public function getMinValue(): ?float
    {
        return $this->minValue;
    }
    /**
     * Lower bound of the number that can be entered by the signer
     *
     * @param float|null $minValue
     *
     * @return self
     */
    public function setMinValue(?float $minValue): self
    {
        $this->initialized['minValue'] = true;
        $this->minValue = $minValue;
        return $this;
    }
    /**
     * Width of the border of the field in default user space units
     *
     * @return float|null
     */
    public function getBorderWidth(): ?float
    {
        return $this->borderWidth;
    }
    /**
     * Width of the border of the field in default user space units
     *
     * @param float|null $borderWidth
     *
     * @return self
     */
    public function setBorderWidth(?float $borderWidth): self
    {
        $this->initialized['borderWidth'] = true;
        $this->borderWidth = $borderWidth;
        return $this;
    }
    /**
     * For web form text fields only - true if the default value may come from the URL, else false
     *
     * @return bool|null
     */
    public function getUrlOverridable(): ?bool
    {
        return $this->urlOverridable;
    }
    /**
     * For web form text fields only - true if the default value may come from the URL, else false
     *
     * @param bool|null $urlOverridable
     *
     * @return self
     */
    public function setUrlOverridable(?bool $urlOverridable): self
    {
        $this->initialized['urlOverridable'] = true;
        $this->urlOverridable = $urlOverridable;
        return $this;
    }
    /**
     * A currency ISO code. Only applicable for payment form fields. Should be one of the currencies supported in the payment integration merchant accounts.
     *
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }
    /**
     * A currency ISO code. Only applicable for payment form fields. Should be one of the currencies supported in the payment integration merchant accounts.
     *
     * @param string|null $currency
     *
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->initialized['currency'] = true;
        $this->currency = $currency;
        return $this;
    }
    /**
     * Input type of the form field
     *
     * @return string|null
     */
    public function getInputType(): ?string
    {
        return $this->inputType;
    }
    /**
     * Input type of the form field
     *
     * @param string|null $inputType
     *
     * @return self
     */
    public function setInputType(?string $inputType): self
    {
        $this->initialized['inputType'] = true;
        $this->inputType = $inputType;
        return $this;
    }
    /**
     * Style of the border of the field.
     *
     * @return string|null
     */
    public function getBorderStyle(): ?string
    {
        return $this->borderStyle;
    }
    /**
     * Style of the border of the field.
     *
     * @param string|null $borderStyle
     *
     * @return self
     */
    public function setBorderStyle(?string $borderStyle): self
    {
        $this->initialized['borderStyle'] = true;
        $this->borderStyle = $borderStyle;
        return $this;
    }
    /**
     * true if this field's value is calculated from an expression, else false
     *
     * @return bool|null
     */
    public function getCalculated(): ?bool
    {
        return $this->calculated;
    }
    /**
     * true if this field's value is calculated from an expression, else false
     *
     * @param bool|null $calculated
     *
     * @return self
     */
    public function setCalculated(?bool $calculated): self
    {
        $this->initialized['calculated'] = true;
        $this->calculated = $calculated;
        return $this;
    }
    /**
     * Content Type of the form field.
     *
     * @return string|null
     */
    public function getContentType(): ?string
    {
        return $this->contentType;
    }
    /**
     * Content Type of the form field.
     *
     * @param string|null $contentType
     *
     * @return self
     */
    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;
        return $this;
    }
    /**
     * Rule for validating the field value.
     *
     * @return string|null
     */
    public function getValidation(): ?string
    {
        return $this->validation;
    }
    /**
     * Rule for validating the field value.
     *
     * @param string|null $validation
     *
     * @return self
     */
    public function setValidation(?string $validation): self
    {
        $this->initialized['validation'] = true;
        $this->validation = $validation;
        return $this;
    }
    /**
     * Display label attached to the field
     *
     * @return string|null
     */
    public function getDisplayLabel(): ?string
    {
        return $this->displayLabel;
    }
    /**
     * Display label attached to the field
     *
     * @param string|null $displayLabel
     *
     * @return self
     */
    public function setDisplayLabel(?string $displayLabel): self
    {
        $this->initialized['displayLabel'] = true;
        $this->displayLabel = $displayLabel;
        return $this;
    }
    /**
     * Hyperlink-specific data for hyperlink form fields
     *
     * @return FormFieldHyperlink|null
     */
    public function getHyperlink(): ?FormFieldHyperlink
    {
        return $this->hyperlink;
    }
    /**
     * Hyperlink-specific data for hyperlink form fields
     *
     * @param FormFieldHyperlink|null $hyperlink
     *
     * @return self
     */
    public function setHyperlink(?FormFieldHyperlink $hyperlink): self
    {
        $this->initialized['hyperlink'] = true;
        $this->hyperlink = $hyperlink;
        return $this;
    }
    /**
     * Background color of the form field in RGB or HEX format
     *
     * @return string|null
     */
    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }
    /**
     * Background color of the form field in RGB or HEX format
     *
     * @param string|null $backgroundColor
     *
     * @return self
     */
    public function setBackgroundColor(?string $backgroundColor): self
    {
        $this->initialized['backgroundColor'] = true;
        $this->backgroundColor = $backgroundColor;
        return $this;
    }
    /**
     * If set to false, then the form field is hidden.  Otherwise, it is visible.
     *
     * @return bool|null
     */
    public function getVisible(): ?bool
    {
        return $this->visible;
    }
    /**
     * If set to false, then the form field is hidden.  Otherwise, it is visible.
     *
     * @param bool|null $visible
     *
     * @return self
     */
    public function setVisible(?bool $visible): self
    {
        $this->initialized['visible'] = true;
        $this->visible = $visible;
        return $this;
    }
    /**
     * Format type of the text field.
     *
     * @return string|null
     */
    public function getDisplayFormatType(): ?string
    {
        return $this->displayFormatType;
    }
    /**
     * Format type of the text field.
     *
     * @param string|null $displayFormatType
     *
     * @return self
     */
    public function setDisplayFormatType(?string $displayFormatType): self
    {
        $this->initialized['displayFormatType'] = true;
        $this->displayFormatType = $displayFormatType;
        return $this;
    }
    /**
     * Upper bound of the number that can be entered by the signer
     *
     * @return float|null
     */
    public function getMaxValue(): ?float
    {
        return $this->maxValue;
    }
    /**
     * Upper bound of the number that can be entered by the signer
     *
     * @param float|null $maxValue
     *
     * @return self
     */
    public function setMaxValue(?float $maxValue): self
    {
        $this->initialized['maxValue'] = true;
        $this->maxValue = $maxValue;
        return $this;
    }
    /**
     * Error message to be shown to the signer if filled value doesn't match the validations of the form field
     *
     * @return string|null
     */
    public function getValidationErrMsg(): ?string
    {
        return $this->validationErrMsg;
    }
    /**
     * Error message to be shown to the signer if filled value doesn't match the validations of the form field
     *
     * @param string|null $validationErrMsg
     *
     * @return self
     */
    public function setValidationErrMsg(?string $validationErrMsg): self
    {
        $this->initialized['validationErrMsg'] = true;
        $this->validationErrMsg = $validationErrMsg;
        return $this;
    }
    /**
     * Format of the value of the field to be displayed based on the displayFormatType property.
     *
     * @return string|null
     */
    public function getDisplayFormat(): ?string
    {
        return $this->displayFormat;
    }
    /**
     * Format of the value of the field to be displayed based on the displayFormatType property.
     *
     * @param string|null $displayFormat
     *
     * @return self
     */
    public function setDisplayFormat(?string $displayFormat): self
    {
        $this->initialized['displayFormat'] = true;
        $this->displayFormat = $displayFormat;
        return $this;
    }
    /**
     * Text values which are visible in a drop down form field
     *
     * @return list<string>|null
     */
    public function getVisibleOptions(): ?array
    {
        return $this->visibleOptions;
    }
    /**
     * Text values which are visible in a drop down form field
     *
     * @param list<string>|null $visibleOptions
     *
     * @return self
     */
    public function setVisibleOptions(?array $visibleOptions): self
    {
        $this->initialized['visibleOptions'] = true;
        $this->visibleOptions = $visibleOptions;
        return $this;
    }
    /**
     * true if it is a read-only field, else false
     *
     * @return bool|null
     */
    public function getReadOnly(): ?bool
    {
        return $this->readOnly;
    }
    /**
     * true if it is a read-only field, else false
     *
     * @param bool|null $readOnly
     *
     * @return self
     */
    public function setReadOnly(?bool $readOnly): self
    {
        $this->initialized['readOnly'] = true;
        $this->readOnly = $readOnly;
        return $this;
    }
    /**
     * Font name of the form field
     *
     * @return string|null
     */
    public function getFontName(): ?string
    {
        return $this->fontName;
    }
    /**
     * Font name of the form field
     *
     * @param string|null $fontName
     *
     * @return self
     */
    public function setFontName(?string $fontName): self
    {
        $this->initialized['fontName'] = true;
        $this->fontName = $fontName;
        return $this;
    }
    /**
     * Conditional actions to perfom on this form field.
     *
     * @return FormFieldConditionalAction|null
     */
    public function getConditionalAction(): ?FormFieldConditionalAction
    {
        return $this->conditionalAction;
    }
    /**
     * Conditional actions to perfom on this form field.
     *
     * @param FormFieldConditionalAction|null $conditionalAction
     *
     * @return self
     */
    public function setConditionalAction(?FormFieldConditionalAction $conditionalAction): self
    {
        $this->initialized['conditionalAction'] = true;
        $this->conditionalAction = $conditionalAction;
        return $this;
    }
    /**
     * Font size of the form field in points
     *
     * @return float|null
     */
    public function getFontSize(): ?float
    {
        return $this->fontSize;
    }
    /**
     * Font size of the form field in points
     *
     * @param float|null $fontSize
     *
     * @return self
     */
    public function setFontSize(?float $fontSize): self
    {
        $this->initialized['fontSize'] = true;
        $this->fontSize = $fontSize;
        return $this;
    }
    /**
     * Alignment of the text.
     *
     * @return string|null
     */
    public function getAlignment(): ?string
    {
        return $this->alignment;
    }
    /**
     * Alignment of the text.
     *
     * @param string|null $alignment
     *
     * @return self
     */
    public function setAlignment(?string $alignment): self
    {
        $this->initialized['alignment'] = true;
        $this->alignment = $alignment;
        return $this;
    }
    /**
     * Font color of the form field in RGB or HEX format
     *
     * @return string|null
     */
    public function getFontColor(): ?string
    {
        return $this->fontColor;
    }
    /**
     * Font color of the form field in RGB or HEX format
     *
     * @param string|null $fontColor
     *
     * @return self
     */
    public function setFontColor(?string $fontColor): self
    {
        $this->initialized['fontColor'] = true;
        $this->fontColor = $fontColor;
        return $this;
    }
    /**
     * Maximum length of the input text field in terms of no. of characters
     *
     * @return int|null
     */
    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }
    /**
     * Maximum length of the input text field in terms of no. of characters
     *
     * @param int|null $maxLength
     *
     * @return self
     */
    public function setMaxLength(?int $maxLength): self
    {
        $this->initialized['maxLength'] = true;
        $this->maxLength = $maxLength;
        return $this;
    }
}