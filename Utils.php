<?php
function signatureToken($dataSign)
    {
        $priv = <<<EOD
-----BEGIN RSA PRIVATE KEY-----
MIIEoQIBAAKCAQBTuqvH0bLqP1yTq3Ya200GRKPq4JxoWRHpGIV6/L+Y45K6ITv9
cDDd7Gpz1Pt7+v79GRnQegCfxq0wUJTl/2fEdWaIbbKv/O2x4L6R/35Be5zl81sT
Rmgsad0T2KUwu6fN0pN/P//RspJnvL0KVFLZddV48KnwaixeMTnolJR9gf+kJ/8L
S8oP7hjB/MhXzzESi72d8S1AmI3QTtHEFmYjLFXWK7g76NA35KRDg/PMJbPhUNYz
2P065TLpgyQxXDb094BT8UpyNaiyiPzNRAeqsgLiVBZRqFvf7zMo6IYDG49t8mt+
3y5Iytjc13oXC6FmKJ3h1o3KGhGnWyauPEZ/AgMBAAECggEABPeeGUyngJ4hr+EM
MKux9h08XELXBJnEJj/+Kz2zYC6gFcrC9FYjkAbmidio0sIhPoKutV+HifMPcz5U
lxB/53fPjWh0oVwv/c2HgMHXi6r5s+qsDIiwxXHCW9sOccWwPtWvSm1Rj+84IE9i
J6q4/42uDG66pjimSTBCbznhVVC/mh43s1hy6WaY5+bwvS+PdWCXkAjQU4fJXBrf
cC1dd+E/Mm95foBvNVbwPqBAyl0RIARBdNBgru5yvNeUQkCFVPGkoCYTnRxiSYXw
JojDjSnMzGtfGjpRP3de+/h9lo1F0sgNAbd+HKAZA1amzbQzi4RpAwbQ2BhY+ajt
g1kYAQKBgQCfnf3RfHWvCTiTfndA+dcpMsUtpFC5dR6Ll3Cxlfq86bNC6OFSG7q6
WSfGUGqG8vc4o4Umb9NolsGWWSk8/E3mL504B2V7pgTYBl1E4q8eXic4VV7T4Eyx
4ppXK0+NypGYIqkvOhxWkwYEqp+AEIMyzB9rx/KZIYMgXRBUwsEbwQKBgQCGSbtw
4P/VX6FaK00f2kMM0QX5SJ1EoM1wlUv7ojQL6HAuE03T0p714owJ1IPd7VbPtpf3
3CGpwbG5UYP4eCpCtzKsQ2nZH2rMEdGIvb9wz1mspKaKw/bTfDy7HLXWkmy0647H
vZ37QgCBzA0rQM3hc5YQ8/nTBLE1oqkpmvryPwKBgE3QCqWuY/yhpSgaNe7CHYcj
DgbzHLtcgjiQ6kpYkDS6RT6wIvARPpWL0x0VpOkG10iQRt/3EfvhypwN+VGWui8m
NSHUUT/XLnNVnvBvBenrAnmu/JyTsy/hBVbLcWvxPcsJ0qqITLpT0FJED5+x7RO9
eO/lOLo4ISGM3OJFUzjBAoGAc0oP86wn2D9+3lP4pdUT5Yf6sfcmlgnb9sEmd8Xd
GzAWR2hpU+cqc/1orvPVto2SD0g7Fh/WgtB5TZnvTD2WQqrXhU9nK3IulT7i/pux
JR/PZEoDdXUijpTF6vqOHsadL4JglZl0bYdPuh++WpkLaHh8qNddb05C+cJJqx+U
PK8CgYAI63B6Ecd01PGGnb9iJPiOwU+J/Ocdr7DH6OtSk+GLICjSCm3gqJu5cXKr
+ivnrMuceY9kOopaJoHOKIhsIWOdOqaTeR3lVhjkrWa1/bAYQvnpgsd1PiNTtPaU
JjvnpT8SNd1pJKyltXDrCghfj/LjQCdk0i/D15OQ7qRKppJ99w==
-----END RSA PRIVATE KEY-----
EOD;
        $algo = "SHA256";
        $binary_signature = "";
        openssl_sign($dataSign, $binary_signature, $priv, $algo);
        $signature = base64_encode($binary_signature);
        return $signature;
    }

function token(){
        $data = [
            'exp' => time() + 900, 
            'nbf' => time(), 
            'iss' => 'ASHDDQ', 
            'iat' => time()
        ];
        $token = base64_encode(json_encode($data));
        return $token;
    }