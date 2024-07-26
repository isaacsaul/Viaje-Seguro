<?php

namespace App\Http\Livewire;

use Livewire\Component;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Infraccion;

class SendEmail extends Component
{
    public $openEmailModal = false;
    public $openConfirmationModal = false;
    public $email_sender = 'mathiasvazquez31@gmail.com';
    public $email_token = 'rrly lxve ekit qkir';  // Utiliza tu contraseña de aplicación aquí
    public $email_receiver; // Ahora el destinatario será dinámico
    public $selectedInfraccion; // Guardará la infracción seleccionada

    // Recibimos el correo del destinatario y la infracción seleccionada como parámetros
    public function mount($email_receiver, $selectedInfraccion)
    {
        $this->email_receiver = $email_receiver;
        $this->selectedInfraccion = $selectedInfraccion;
    }

    public function sendEmail()
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Gmail
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->email_sender;
            $mail->Password = $this->email_token;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom($this->email_sender);
            $mail->addAddress($this->email_receiver);

            $mail->isHTML(true);
            $mail->Subject = 'Detalles del reporte';

            // Obtener los detalles de la infracción seleccionada
            $infraccion = Infraccion::findOrFail($this->selectedInfraccion);

            // Construir el cuerpo del correo
            $body = '<h2>Detalles del reporte</h2>';
            $body .= '<p>Fecha de Reporte: ' . $infraccion->fechainfraccion . '</p>';
            $body .= '<p>Estimado ' . $infraccion->chofer->nombres . ',</p>';
            $body .= '<p>Por medio de la presente, le notificamos que ha sido reportado por ' . $infraccion->tipoinfraccion . ' el día ' . $infraccion->fechainfraccion . '. Su caso actualmente se encuentra ' . $infraccion->estado . ' y se le ha aplicado ' . $infraccion->sancion->tiposancion . ' como sanción.</p>';
            $body .= '<p>Detalles del Reporte:</p>';
            $body .= '<ul>';
            $body .= '<li>Tipo de Infracción: ' . $infraccion->tipoinfraccion . '</li>';
            $body .= '<li>Fecha de Infracción: ' . $infraccion->fechainfraccion . '</li>';
            $body .= '<li>Estado: ' . $infraccion->estado . '</li>';
            $body .= '<li>Id de Sanción: ' . $infraccion->id_sancion . '</li>';
            $body .= '<li>Tipo de Sanción: ' . $infraccion->sancion->tiposancion . '</li>';
            $body .= '<li>Tipo de Sanción: ' . $infraccion->sancion->descripcion . '</li>';
            $body .= '</ul>';
            $body .= '<p>Atentamente,</p>';
            $body .= '<p>La Administración</p>';

            $mail->Body = $body;

            $mail->send();
            $this->openEmailModal = false; // Cierra el modal de enviar correo
            $this->openConfirmationModal = true; // Abre el modal de confirmación
            
        } catch (Exception $e) {
            session()->flash('error', 'Error al enviar el correo: ' . $mail->ErrorInfo);
        }
    }

    public function render()
    {
        return view('livewire.send-email');
    }
}
