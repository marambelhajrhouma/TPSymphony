package com.spiral.technologies;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

import com.spiral.technologies.service.RecService;

@RestController
public class RecrutementRessource {

    private final RecService service;

    @Autowired
    public RecrutementRessource(RecService service) {
        this.service = service;
    }

    @GetMapping("/demare-Recrutement")
    public ResponseEntity<String> demarerRecrutement() {
        service.demarerRecrutement();
        return ResponseEntity.ok("Le recrutement est démarré");
    }

}
